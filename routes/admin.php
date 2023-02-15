<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showForm')->name('admin.login.show')->middleware('guest:admin');
    Route::post('/login', 'login')->name('admin.login.post');
    Route::get('/logout', 'logout')->name('admin.logout');
});

Route::middleware(['admin', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});
