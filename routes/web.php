<?php

use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',  HomeController::class)->name('home');

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/preview/{id}', 'preview')->name('product.preview');
    Route::get('/product/show/{id}', 'show')->name('product.show');
});


// Route::view('/login', 'pages.auth.login')->name('login');
// Route::view('/register', 'pages.auth.register')->name('register');
// Route::view('/reset-password', 'pages.auth.reset-password')->name('reset.password');
// Route::view('/coming-soon', 'pages.coming-soon')->name('coming.soon');
// Route::view('/maintenance', 'pages.maintenance')->name('maintenance');
