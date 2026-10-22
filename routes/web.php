<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/verify-registration', [AuthController::class, 'verifyRegistration'])->name('register.verify');
    Route::post('/resend-registration-code', [AuthController::class, 'resendRegistrationCode'])->name('register.resend');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => view('portfolio'));
    Route::get('/api/portfolios', [PortfolioController::class, 'index']);
    Route::post('/api/portfolios', [PortfolioController::class, 'store']);
    Route::put('/api/portfolios/{portfolio}', [PortfolioController::class, 'update']);
    Route::delete('/api/portfolios/{portfolio}', [PortfolioController::class, 'destroy']);
    Route::get('/api/trash', [PortfolioController::class, 'trash']);
    Route::post('/api/trash/{id}/restore', [PortfolioController::class, 'restore']);
    Route::delete('/api/trash/{id}', [PortfolioController::class, 'forceDelete']);
});

Route::get('/p/{portfolio}', [PortfolioController::class, 'publicShow'])->name('portfolio.public');
