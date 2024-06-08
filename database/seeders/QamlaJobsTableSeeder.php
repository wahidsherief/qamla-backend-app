<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QamlaJobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for seeding
        $jobs = [];

        for ($i = 1; $i <= 20; $i++) {
            $jobs[] = [
                'employer_id' => rand(1, 5),
                'qamla_job_category_id' => rand(1, 5),
                'qamla_job_title_id' => rand(1, 20),
                'deadline' => Carbon::now()->addDays(rand(10, 60)),
                'min_salary' => rand(20000, 40000) * 1.0,
                'max_salary' => rand(45000, 70000) * 1.0,
                'vacancy' => rand(1, 10),
                'location' => 'Location ' . $i,
                'educational_requirement' => 'Educational requirement ' . $i,
                'experience_requirement' => 'Experience requirement ' . $i,
                'additional_requirement' => 'Additional requirement ' . $i,
                'responsibilities' => 'Responsibilities ' . $i,
                'benefits' => 'Benefits ' . $i,
                'is_negotiable' => rand(0, 1),
                'is_employed' => rand(0, 1),
                'is_published' => rand(0, 1),
                'is_deleted' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert data into the qamla_jobs table
        DB::table('qamla_jobs')->insert($jobs);
    }
}
