<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController; // Add this import for CartController
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
    
    // Cart Route (View Cart)
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
    
    // Add to Cart Route
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add'); // Route to handle adding items to the cart

    // Route for updating cart quantity
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // Route for updating cart quantity

    // Route for removing an item from the cart
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Using DELETE for remove
    
    Route::get('/checkout', [CheckOutController::class,'subTotal'])->name('checkout');

    Route::get('/payment',function()
    {
        return view('FinalPayment');
    })->name('payment');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/shop', [ShopController::class, 'Products'])->name('shop');

    Route::get('/sale',[SaleController::class, 'Sale'])->name('sale');

    Route::get('contactus', [ContactController::class, 'showContactForm'])->name('contact');


Route::post('/contact', [ContactController::class, 'sendMessage'])->name('contact.submit');



});
