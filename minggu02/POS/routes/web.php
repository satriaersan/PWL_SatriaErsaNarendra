<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;


Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk halaman Products dengan prefix 'category'
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// Route untuk halaman User dengan parameter id
Route::get('/user/{id}', [UserController::class, 'profile'])->name('user.profile');

// Route untuk halaman Penjualan (POS)
Route::get('/sales', [SalesController::class, 'index'])->name('sales');