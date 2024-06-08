<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QamlaJobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'Chef',
            'Sous Chef',
            'Line Cook',
            'Pastry Chef',
            'Restaurant Manager',
            'Assistant Restaurant Manager',
            'Host/Hostess',
            'Waiter/Waitress',
            'Bartender',
            'Barista',
            'Dishwasher',
            'Food Runner',
            'Busser',
            'Sommelier',
            'Kitchen Manager',
            'Food and Beverage Manager',
            'Catering Manager',
            'Banquet Manager',
            'Hotel Front Desk Clerk',
            'Housekeeper'
        ];

        foreach ($titles as $title) {
            DB::table('qamla_job_titles')->insert([
                'title' => $title,
            ]);
        }
    }
}
