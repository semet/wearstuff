<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showForm')->name('admin.login.show')->middleware('guest:admin');
    Route::post('/login', 'login')->name('admin.login.post');
    Route::get('/logout', 'logout')->name('admin.logout');
});

Route::middleware(['admin', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    //Order Routes
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'index')->name('admin.order');
        Route::get('/order/lists', 'getOrders')->name('admin.order.lists');
        Route::get('/order/show/{order}', 'show')->name('admin.order.show');
        Route::get('/order/print/{order}', 'print')->name('admin.order.print');
    });
    //Customer Routes
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'index')->name('admin.customer');
        Route::get('/customer/lists', 'getCustomers')->name('admin.customer.lists');
    });
    //Categories Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('admin.category');
        Route::post('/category', 'store')->name('admin.category.store');
        Route::get('/category/{category}/edit', 'edit')->name('admin.category.edit');
        Route::post('/category/update/{id}', 'update')->name('admin.category.update');
        Route::get('/category/delete/{id}', 'destroy')->name('admin.category.delete');
    });
    //Product Routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/product/lists', 'getProducts')->name('admin.product.lists');
        Route::get('/product/create', 'create')->name('admin.product.create');
        Route::post('/product', 'store')->name('admin.product.store');
        Route::get('/product/upload-image', 'imagUpload')->name('admin.product.upload-image');
    });
});
