<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\MarchentAuthController;
use App\Http\Controllers\Marchent\HomeController;
use App\Http\Controllers\Marchent\ParcelController;
use App\Http\Controllers\Marchent\PaymentController;
use App\Http\Controllers\Marchent\PickupController;
use App\Http\Controllers\Marchent\ProfileController;
use App\Http\Controllers\Marchent\ShopPaymentController;

Route::prefix('marchent')->name('marchent.')->group(function () {
    Route::get('register', [MarchentAuthController::class, 'create'])->name('register');
    Route::post('register', [MarchentAuthController::class, 'register'])->name('register.store');
    Route::get('login', [MarchentAuthController::class, 'index'])->name('login');
    Route::post('login', [MarchentAuthController::class, 'attempt'])->name('login.attempt');

    Route::middleware('marchent')->group(function(){

        Route::get('/', [HomeController::class, 'index']);
        Route::get('dashboard', [HomeController::class, 'index'])->name('home');

        Route::get('parcels/datatable', [ParcelController::class, 'dataTable'])->name('parcels.datatable');
        Route::post('parcles/area', [ParcelController::class, 'area'])->name('parcels.area');
        Route::get('parcles/{tracking}/print', [ParcelController::class, 'print'])->name('parcels.print');
        Route::resource('parcels', ParcelController::class);
        Route::resource('pickups', PickupController::class);
        Route::resource('settings/payments', PaymentController::class);
        Route::get('shop-payments/{id}/print', [ShopPaymentController::class, 'print'])->name('invoice.print');
        Route::resource('shop-payments', ShopPaymentController::class);

        Route::post('profile/update', [ProfileController::class, 'UpdateProfile'])->name('update.profile');
        Route::post('profile/password', [ProfileController::class, 'UpdatePassword'])->name('update.password');
        Route::resource('profile', ProfileController::class);


    });

});