<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::get('users/{user}', [UserController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/backend', [PageController::class, 'backend']);
Route::get('/frontend', [PageController::class, 'frontend']);
Route::get('/uiux', [PageController::class, 'uiux']);
Route::get('/dataanalyst', [PageController::class, 'dataanalyst']);
Route::get('/techwriter', [PageController::class, 'techwriter']);



Route::get('/dashboard', fn () => 'dashboard')
    ->name('dashboard')
    ->middleware('kmkey');

// OR

Route::middleware('kmkey')->group(function () {
    Route::get('/dashboard', fn () => 'Dashboard')->name('dashboard');
});
