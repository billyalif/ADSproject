<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');

    Route::middleware('auth:sanctum')->group(function () {

        Route::prefix('/profile')->group(function () {
            Route::get('/', 'profile');
            Route::post('/', 'update');
        });

        Route::post('/logout', 'logout');
    });

    Route::resource('/productz', ProductController::class)->middleware('auth:sanctum');
});
