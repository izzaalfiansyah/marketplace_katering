<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');

        $data = [];

        Province::truncate();

        foreach ($response->json() as $item) {
            $data[] = [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        };

        Province::insert($data);
    }
}
