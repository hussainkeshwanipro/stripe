<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;



Route::get('/', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
Route::post('refund', [StripeController::class, 'refund'])->name('refund');