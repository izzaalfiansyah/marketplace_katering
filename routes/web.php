<?php

use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Merchant\KateringController;
use App\Http\Controllers\Merchant\MenuController;
use App\Http\Controllers\Merchant\OrderController as MerchantOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIsIdentityFull;
use App\Http\Middleware\CheckIsMerchantMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/profile', ProfileController::class);

    Route::middleware(CheckIsIdentityFull::class)->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/my-order/create/merchant/{merchantId}', [OrderController::class, 'createByMerchant']);
        Route::post('/my-order/create/{orderId}', [OrderController::class, 'addDetails']);
        Route::delete('/my-order/destroy/{orderId}/{detailId}', [OrderController::class, 'destroyDetails']);
        Route::put('/my-order/{id}/cancel', [OrderController::class, 'cancelOrder']);
        Route::resource('/my-order', OrderController::class);

        Route::middleware(CheckIsMerchantMiddleware::class)->group(function () {
            Route::resource('/katering', KateringController::class);
            Route::resource('/menu', MenuController::class);
            Route::put('/order/{id}/process', [MerchantOrderController::class, 'processOrder']);
            Route::put('/order/{id}/cancel', [MerchantOrderController::class, 'cancelOrder']);
            Route::put('/order/{id}/complete', [MerchantOrderController::class, 'completeOrder']);
            Route::resource('/order', MerchantOrderController::class);
        });
    });
});
