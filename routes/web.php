<?php

use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Merchant\MenuController;
use App\Http\Middleware\CheckIsMerchantMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::middleware(CheckIsMerchantMiddleware::class)->group(function () {
        Route::resource('/menu', MenuController::class);
    });
});
