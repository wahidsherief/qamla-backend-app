<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Candidate;
use App\Models\Admin;
use App\Models\Employer;

class AuthService
{
    private $guards = [
        'admin' => 'admin-api',
        'candidate' => 'candidate-api',
        'employer' => 'employer-api',
    ];

    private $models = [
        'admin' => Admin::class,
        'candidate' => Candidate::class,
        'employer' => Employer::class,
    ];

    public function register($request)
    {
        $validatedData = $request->validated();

        $role = $request->role;

        if (!isset($this->guards[$role])) {
            return response()->json(['error' => 'Invalid role'], 400);
        }

        $model = $this->models[$role];

        $user = $model::create([
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $guard = $this->guards[$role];

        $token = Auth::guard($guard)->login($user);

        return $this->createNewToken($token, $request->role);
    }

    public function login($request)
    {
        $role = $request->role;

        if (!isset($this->guards[$role])) {
            return response()->json(['error' => 'Invalid role'], 400);
        }

        $guard = $this->guards[$role];

        if (!$token = Auth::guard($guard)->attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token, $request->role);
    }

    public function logout()
    {
        auth()->logout();

        if (!auth()->check()) {
            return response()->json(['message' => 'Logged out successfully']);
        }
    }

    public function user()
    {
        return auth()->user();
    }

    private function createNewToken($token, $role)
    {
        $guard = $this->guards[$role];

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => strtotime('+60 minutes'),
            'user' => Auth::guard($guard)->user(),
            'role' => $role
        ];
    }
}
