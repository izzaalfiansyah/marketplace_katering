<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Regency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = Province::all();

        Regency::truncate();

        $data = [];

        foreach ($provinces as $province) {
            $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/' . $province->id . '.json');

            foreach ($response->json() as $item) {
                $data[] = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'province_id' => $item['province_id'],
                ];
            };
        }

        Regency::insert($data);
    }
}
