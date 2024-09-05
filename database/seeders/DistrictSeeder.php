<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Regency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regencies = Regency::all();

        District::truncate();

        $data = [];

        foreach ($regencies as $regency) {
            $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/districts/' . $regency->id . '.json');

            foreach ($response->json() as $item) {
                $data[] = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'regency_id' => $item['regency_id'],
                ];
            };
        }

        District::insert($data);
    }
}
