<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CandidateDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $candidates = [];
        $experiences = [];
        $educations = [];
        $certifications = [];

        for ($i = 0; $i < 20; $i++) {
            $candidateId = DB::table('candidates')->insertGetId([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'middle_name' => $faker->optional()->firstName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => $faker->boolean(50) ? now() : null,
                'password' => bcrypt('password'),
                'contact' => $faker->phoneNumber,
                'image' => $faker->imageUrl(640, 480, 'people'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $experiences[] = [
                'candidate_id' => $candidateId,
                'title' => $faker->jobTitle,
                'responsibilities' => $faker->text,
                'employment_type' => $faker->randomElement(['Full-time', 'Part-time', 'Contract']),
                'employer' => $faker->company,
                'contacts' => $faker->phoneNumber,
                'start_date' => $faker->date,
                'end_date' => $faker->boolean(70) ? $faker->date : null,
                'is_currently_working' => $faker->boolean(30)
            ];

            $educations[] = [
                'candidate_id' => $candidateId,
                'institution' => $faker->company,
                'qualification' => $faker->randomElement(['Bachelor', 'Master', 'PhD']),
                'course' => $faker->randomElement(['Business', 'Engineering', 'Art', 'Medicine']),
                'grades' => $faker->randomElement(['A', 'B+', 'B', 'C']),
                'address' => $faker->address,
                'completion_year' => $faker->year
            ];

            $certifications[] = [
                'candidate_id' => $candidateId,
                'title' => $faker->sentence,
                'issuing_organization' => $faker->company,
                'completion_date' => $faker->date
            ];
        }

        DB::table('experiences')->insert($experiences);
        DB::table('educations')->insert($educations);
        DB::table('certifications')->insert($certifications);
    }
}
