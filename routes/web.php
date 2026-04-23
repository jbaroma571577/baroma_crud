<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RiceController;

// Public routes
Route::get('/', function () {
    return redirect('/rice');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Rice items
    Route::resource('rice', RiceController::class);

    // Orders
    Route::resource('orders', OrderController::class)
        ->only(['index', 'create', 'store', 'show']);

    // Payments (FIXED)
    Route::get('/payments', [PaymentController::class, 'index'])
        ->name('payments.index');

    Route::get('/payments/{payment}', [PaymentController::class, 'show'])
        ->name('payments.show');

    Route::post('/payments/{payment}/process', [PaymentController::class, 'process'])
        ->name('payments.process');
});