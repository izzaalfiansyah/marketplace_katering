<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');

    echo '<pre>';
    print_r($response->json());
});
