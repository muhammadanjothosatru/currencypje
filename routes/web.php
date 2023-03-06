<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\KonversiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/currency', CurrencyController::class);
Route::resource('/konversi', KonversiController::class);
Route::get('/trash', [CurrencyController::class, 'trash']);
Route::get('/trash/{id}', [CurrencyController::class, 'restore']);
Route::get('/trash/{id}', [CurrencyController::class, 'forcedelete']);