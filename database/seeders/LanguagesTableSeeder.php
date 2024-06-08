<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['title' => 'English', 'is_deleted' => false],
            ['title' => 'Spanish', 'is_deleted' => false],
            ['title' => 'French', 'is_deleted' => false],
            ['title' => 'German', 'is_deleted' => false],
            ['title' => 'Chinese', 'is_deleted' => false],
            ['title' => 'Japanese', 'is_deleted' => false],
            ['title' => 'Russian', 'is_deleted' => false],
            ['title' => 'Portuguese', 'is_deleted' => false],
            ['title' => 'Italian', 'is_deleted' => false],
            ['title' => 'Arabic', 'is_deleted' => false],
            ['title' => 'Dutch', 'is_deleted' => false],
            ['title' => 'Swedish', 'is_deleted' => false],
            ['title' => 'Korean', 'is_deleted' => false],
            ['title' => 'Hindi', 'is_deleted' => false],
            ['title' => 'Bengali', 'is_deleted' => false],
            ['title' => 'Ukrainian', 'is_deleted' => false],
            ['title' => 'Vietnamese', 'is_deleted' => false],
            ['title' => 'Polish', 'is_deleted' => false],
            ['title' => 'Hebrew', 'is_deleted' => false],
            ['title' => 'Turkish', 'is_deleted' => false],
        ];

        DB::table('languages')->insert($languages);
    }
}
