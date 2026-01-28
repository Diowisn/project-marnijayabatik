<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MotifController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Front\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ========== PUBLIC ROUTES ==========
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [FrontProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [FrontProductController::class, 'show'])->name('products.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// ========== AUTH ROUTES ==========
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ========== ADMIN ROUTES ==========
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
    // Motifs
    Route::get('/motifs', [MotifController::class, 'index'])->name('motifs.index');
    Route::get('/motifs/create', [MotifController::class, 'create'])->name('motifs.create');
    Route::post('/motifs', [MotifController::class, 'store'])->name('motifs.store');
    Route::get('/motifs/{id}/edit', [MotifController::class, 'edit'])->name('motifs.edit');
    Route::put('/motifs/{id}', [MotifController::class, 'update'])->name('motifs.update');
    Route::delete('/motifs/{id}', [MotifController::class, 'destroy'])->name('motifs.destroy');

    // User Management
    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('change-password');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('change-password.update');
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});