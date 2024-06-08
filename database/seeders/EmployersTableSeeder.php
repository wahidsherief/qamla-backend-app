<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class EmployersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $employers = [];

        for ($i = 0; $i < 20; $i++) {
            $employers[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'middle_name' => $faker->optional()->firstName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'photo' => $faker->optional()->imageUrl(200, 200, 'people'),
                'address_line_1' => $faker->streetAddress,
                'address_line_2' => $faker->optional()->secondaryAddress,
                'post_code' => $faker->postcode,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'primary_phone' => $faker->phoneNumber,
                'secondary_phone' => $faker->optional()->phoneNumber,
                'gender' => $faker->optional()->randomElement(['male', 'female']),
                'company_name' => $faker->company,
                'company_size' => $faker->optional()->randomElement(['small', 'medium', 'large']),
                'industry_type' => $faker->optional()->randomElement(['IT', 'Finance', 'Education', 'Health', 'Retail']),
                'documents' => $faker->optional()->text,
                'is_verified' => $faker->boolean,
                'company_address_line_1' => $faker->streetAddress,
                'company_address_line_2' => $faker->optional()->secondaryAddress,
                'company_post_code' => $faker->postcode,
                'company_city' => $faker->city,
                'company_state' => $faker->state,
                'company_country' => $faker->country,
                'is_deleted' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('employers')->insert($employers);
    }
}
