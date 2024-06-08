<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployerController;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::group(['prefix' => 'candidate', 'middleware' => ['auth:candidate-api']], function () {
    Route::controller(CandidateController::class)->group(function () {
        Route::post('/logout', 'logout');
        Route::get('/jobs', 'getJobs');
    });
});

// Route::group(['prefix' => 'employer', 'middleware' => ['auth:employer-api']], function ($router) {
//     Route::controller(EmployerController::class)->group(function () {
//         Route::post('/logout', 'logout');
//         Route::get('/jobs', 'getJobs');
//         Route::get('/job/titles', 'getJobTitles');
//         Route::post('/job/save', 'saveJob');
//         Route::put('/job/update/{id}', 'updateJob');
//         Route::delete('/job/delete/{id}', 'deleteJob');
//     });
// });

Route::group(['prefix' => 'employer'], function ($router) {
    Route::controller(EmployerController::class)->group(function () {
        Route::post('/logout', 'logout');
        Route::get('/jobs', 'getJobs');
        Route::get('/job/titles', 'getJobTitles');
        Route::post('/job/search', 'searchJob');
        Route::post('/job/save', 'saveJob');
        Route::put('/job/update/{id}', 'updateJob');
        Route::delete('/job/delete/{id}', 'deleteJob');
    });
});
