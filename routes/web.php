<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[LoginController::class,'Login'])->name('Login');
Route::get('/signup',[LoginController::class,'SignUp'])->name('SignUp');
Route::get('/termsandconditions',[LoginController::class,'TandC'])->name('TermsAndConditions');
