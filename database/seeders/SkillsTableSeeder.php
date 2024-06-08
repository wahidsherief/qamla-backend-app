<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            ['title' => 'Food Preparation', 'is_deleted' => false],
            ['title' => 'Guest Services', 'is_deleted' => false],
            ['title' => 'Hospitality Management', 'is_deleted' => false],
            ['title' => 'Event Planning', 'is_deleted' => false],
            ['title' => 'Mixology', 'is_deleted' => false],
            ['title' => 'Sommelier Knowledge', 'is_deleted' => false],
            ['title' => 'Housekeeping', 'is_deleted' => false],
            ['title' => 'Reservation Management', 'is_deleted' => false],
            ['title' => 'Menu Design', 'is_deleted' => false],
            ['title' => 'Culinary Expertise', 'is_deleted' => false],
            ['title' => 'Customer Service Excellence', 'is_deleted' => false],
            ['title' => 'Banquet Operations', 'is_deleted' => false],
            ['title' => 'Health and Safety Regulations', 'is_deleted' => false],
            ['title' => 'Catering Experience', 'is_deleted' => false],
            ['title' => 'Point of Sale Systems', 'is_deleted' => false],
            ['title' => 'Complaint Resolution', 'is_deleted' => false],
            ['title' => 'Team Leadership', 'is_deleted' => false],
            ['title' => 'Inventory Management', 'is_deleted' => false],
            ['title' => 'Hygiene and Sanitation', 'is_deleted' => false],
            ['title' => 'Wine Pairing', 'is_deleted' => false],
        ];

        DB::table('skills')->insert($skills);
    }
}
