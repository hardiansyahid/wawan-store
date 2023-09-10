<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard']);


Route::prefix('auth')->group(function (){
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index']);
    Route::post('/doLogin', [\App\Http\Controllers\AuthController::class, 'doLogin']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::prefix('user')->group(function (){
    Route::get('', [\App\Http\Controllers\UserController::class, 'index']);
});
Route::prefix('barang')->group(function (){
    Route::get('', [\App\Http\Controllers\BarangController::class, 'index']);
});
Route::prefix('penjualan')->group(function (){
    Route::get('', [\App\Http\Controllers\PenjualanController::class, 'index']);
    Route::get('/tambah', [\App\Http\Controllers\PenjualanController::class, 'tambah']);
});

Route::resource('references', \App\Http\Controllers\MstReferenceController::class);
