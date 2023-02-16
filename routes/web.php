<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Landing\AccountController;
use App\Http\Controllers\Landing\AddressController;
use App\Http\Controllers\Landing\CartController;
use App\Http\Controllers\Landing\CheckoutController;
use App\Http\Controllers\Landing\GeneralController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\PasswordResetController;
use App\Http\Controllers\Landing\ProductController;
use App\Http\Controllers\Landing\ProductReviewController;
use App\Http\Controllers\Landing\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/',  HomeController::class)->name('home');

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/preview/{id}', 'preview')->name('product.preview');
    Route::get('/product/show/{id}', 'show')->name('product.show');
});

Route::controller(ProductReviewController::class)->group(function () {
    Route::post('/review/store/{id}', 'store')->name('review.store');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showForm')->middleware('guest')->name('login.show');
    Route::post('/login/http', 'loginHttp')->middleware('guest')->name('login.post');
    Route::post('/login/ajax', 'loginAjax')->name('login.ajax.post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(PasswordResetController::class)->group(function () {
    Route::get('/password-reset', 'index')->name('password.reset');
    Route::post('/password-reset/request', 'sendPasswordResetRequest')->name('password.send.request');
    Route::get('/password-reset/{token}', 'showForm')->name('password.reset.show');
    Route::post('/password-reset/{token}', 'update')->name('password.reset.update');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showForm')->name('register.show');
    Route::post('/register', 'register')->name('register.post');
    Route::get('/register/{user}', 'success')->name('register.success');
    Route::get('/register/verify-email/{id}', 'verifyEmail')->name('register.verify.email');
});

//protected routes
Route::middleware(['auth'])->group(function () {
    Route::post('/address/store', [AddressController::class, 'store'])
        ->name('address.store');
    Route::controller(GeneralController::class)->group(function () {
        Route::get('/city-by-province', 'cityByProvince')->name('city.by.province');
        Route::get('/courier-by-city', 'courierByCity')->name('courier.by.city');
    });

    Route::controller(AccountController::class)->group(function () {
        Route::get('/account', 'index')->name('account');
        Route::post('/account/profile', 'updateProfile')->name('account.update.profile');
        Route::post('/account/photo', 'updatePhoto')->name('account.update.photo');
        Route::post('/account/password', 'updatePassword')->name('account.update.password');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart');
        Route::get('/cart/add/{productId}/{quantity?}', 'addToCart')->name('cart.add');
        Route::get('/cart/remove/{cart}', 'removeItem')->name('cart.remove');
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout', 'index')->name('checkout');
        Route::post('/checkout/choose-delivery-service', 'chooseDeliveryService')->name('checkout.choose.delivery.service');
        Route::post('/checkout/insert', 'insertData')->name('checkout.insert.data');
        Route::get('/checkout/preview/{order}', 'preview')->name('checkout.preview');
        Route::get('/checkout/success/{order}', 'checkoutSuccess')->name('checkout.success');
        Route::get('/checkout/pending/{order}', 'checkoutPending')->name('checkout.pending');
    });
});

Route::view('/coming-soon', 'pages.coming-soon')->name('coming.soon');
Route::view('/maintenance', 'pages.maintenance')->name('maintenance');
