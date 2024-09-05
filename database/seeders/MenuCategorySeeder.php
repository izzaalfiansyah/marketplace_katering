<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Makanan',
            'Minuman',
            'Snack',
            'Dessert',
        ];

        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'name' => $category
            ];
        }

        MenuCategory::insert($data);
    }
}
