<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Landing\AddressController;
use App\Http\Controllers\Landing\CartController;
use App\Http\Controllers\Landing\CheckoutController;
use App\Http\Controllers\Landing\GeneralController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',  HomeController::class)->name('home');

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/preview/{id}', 'preview')->name('product.preview');
    Route::get('/product/show/{id}', 'show')->name('product.show');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showForm')->middleware('guest')->name('login.show');
    Route::post('/login/http', 'loginHttp')->middleware('guest')->name('login.post');
    Route::post('/login/ajax', 'loginAjax')->name('login.ajax.post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/address/store', [AddressController::class, 'store'])
        ->name('address.store');
    Route::controller(GeneralController::class)->group(function () {
        Route::get('/city-by-province', 'cityByProvince')->name('city.by.province');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart');
        Route::get('/cart/add/{product}', 'addToCart')->name('cart.add');
        Route::get('/cart/remove/{product}', 'removeItem')->name('cart.remove');
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout', 'index')->name('checkout');
        Route::post('/checkout/choose-delivery-service', 'chooseDeliveryService')->name('checkout.choose.delivery.service');
        Route::post('/checkout/insert', 'insertData')->name('checkout.insert.data');
        Route::get('/checkout/preview/{order}', 'preview')->name('checkout.preview');
        Route::get('/checkout/success/{order}', 'checkoutSuccess')->name('checkout.success');
    });
});
Route::view('/register', 'pages.auth.register')->name('register');
Route::view('/reset-password', 'pages.auth.reset-password')->name('reset.password');
Route::view('/coming-soon', 'pages.coming-soon')->name('coming.soon');
Route::view('/maintenance', 'pages.maintenance')->name('maintenance');
