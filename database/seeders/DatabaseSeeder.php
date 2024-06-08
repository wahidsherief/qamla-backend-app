<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(QamlaJobsTableSeeder::class);
        $this->call(QamlaJobTitlesTableSeeder::class);
        $this->call(EmployersTableSeeder::class);
        $this->call(CandidateDataSeeder::class);
        $this->call(QamlaJobCategoriesTableSeeder::class);
        $this->call(QamlaJobTypesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
    }
}
