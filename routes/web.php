<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/backend', fn() => view('backend'));
Route::get('/frontend', fn() => view('frontend'));
Route::get('/uiux', fn() => view('uiux'));
Route::get('/dataanalyst', fn() => view('data'));
Route::get('/techwriter', fn() => view('writer'));

