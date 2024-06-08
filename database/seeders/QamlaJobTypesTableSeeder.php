<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\QamlaJobType;

class QamlaJobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the enum titles
        $titles = [
           ['title' => 'on-site'],
           ['title' => 'remote'],
           ['title' => 'hybrid'],
        ];

        QamlaJobType::insert($titles);
    }
}
