<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
// Public Routes (Unauthenticated users only)
Route::middleware(['guest'])->group(function () {
    // Login Routes
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Signup Routes
    Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');

    // Terms and Conditions page
    Route::get('/termsandconditions', function () {
        return view('auth.TermsAndConditions');
    })->name('terms_and_conditions');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard Route (Requires Authentication)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Newsletter Subscription Route
    Route::post('/subscribe', [DashboardController::class, 'subscribe'])->name('newsletter.subscribe');

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
