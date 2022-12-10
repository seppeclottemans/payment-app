<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PaymentController::class, 'index'])->name('home');
Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::get('payment/success/{payment}', [PaymentController::class, 'success'])->name('payment.success')->middleware('signed');
