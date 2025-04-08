<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about'); // Add About Us route
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Authentication Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'register']);
});

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard'); // Ensure this points to the index method
    
    // Products Routes
    Route::resource('products', ProductController::class);
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});