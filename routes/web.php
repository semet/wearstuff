<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/login', 'pages.auth.login')->name('login');
Route::view('/register', 'pages.auth.register')->name('register');
Route::view('/reset-password', 'pages.auth.reset-password')->name('reset.password');
Route::view('/coming-soon', 'pages.coming-soon')->name('coming.soon');
Route::view('/maintenance', 'pages.maintenance')->name('maintenance');
