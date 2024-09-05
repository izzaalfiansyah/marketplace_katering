<?php

use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Merchant\MenuController;
use App\Http\Middleware\CheckIsMerchantMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/my-order/create/merchant/{merchantId}', [OrderController::class, 'createByMerchant']);
    Route::post('/my-order/create/{orderId}', [OrderController::class, 'addDetails']);
    Route::delete('/my-order/destroy/{orderId}/{detailId}', [OrderController::class, 'destroyDetails']);
    Route::put('/my-order/{id}/cancel', [OrderController::class, 'cancelOrder']);
    Route::resource('/my-order', OrderController::class);

    Route::middleware(CheckIsMerchantMiddleware::class)->group(function () {
        Route::resource('/menu', MenuController::class);
    });
});
