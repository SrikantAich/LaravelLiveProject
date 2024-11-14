<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Public Routes (Unauthenticated users only)
Route::middleware(['guest'])->group(function () {
    // Show Terms and Conditions page
    Route::get('/termsandconditions', function () {
        return view('auth.TermsAndConditions'); // Adjust the view path if necessary
    })->name('terms_and_conditions');

    // Login Routes
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Signup Routes
    Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
});

// Dashboard Route (Requires Authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
