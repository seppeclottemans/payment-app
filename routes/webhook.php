<?php

use App\Http\Controllers\MollieController;
use Illuminate\Support\Facades\Route;

Route::post('mollie', [MollieController::class, 'update'])->name('webhook.mollie.update');
