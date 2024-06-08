<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\QamlaJobCategory;

class QamlaJobCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fine Dining',
            'Casual Dining',
            'Fast Food',
            'Cafe',
            'Buffet',
            'Food Truck',
            'Bistro',
            'Pub',
            'Bar',
            'Club',
            'Brasserie',
            'Diner',
            'Pizzeria',
            'Steakhouse',
            'Vegan and Vegetarian',
            'Seafood Restaurant',
            'Theme Restaurant',
            'Tapas Bar',
            'Cocktail Lounge',
            'Coffeehouse'
        ];

        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'title' => $category,
                'is_deleted' => false
            ];
        }

        QamlaJobCategory::insert($data);
    }
}
