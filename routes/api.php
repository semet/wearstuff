<?php

use App\Http\Controllers\Landing\MidtransController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/midtrans/success/callback', [MidtransController::class, 'paymentSuccess'])->name('midtrans.callback');
Route::post('/midtrans/pending/callback', [MidtransController::class, 'paymentPending'])->name('midtrans.callback');
