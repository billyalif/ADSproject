<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::get('users/{user}', [UserController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product-input', [ProductController::class, 'insert']);
Route::get('/store', [ProductController::class, 'index2']);
Route::post('/product-create', [ProductController::class, 'store']);
Route::get('/product-delete/{id}', [ProductController::class, 'destroy']);
Route::post('/product-update/{id}', [ProductController::class, 'update']);
Route::get('/product-edit/{id}', [ProductController::class, 'edit']);

Route::get('/dashboard', fn () => 'dashboard')
    ->name('dashboard')
    ->middleware('kmkey');

// OR

Route::middleware('kmkey')->group(function () {
    Route::get('/dashboard', fn () => 'Dashboard')->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

