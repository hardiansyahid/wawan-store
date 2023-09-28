<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::prefix('auth')->group(function (){
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
    Route::post('/doLogin', [\App\Http\Controllers\AuthController::class, 'doLogin']);
});

Route::middleware(['auth'])->group(function (){
    Route::post('auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::middleware(['isKasir'])->group(function (){
        Route::prefix('penjualan')->group(function (){
            Route::get('', [\App\Http\Controllers\PenjualanController::class, 'index']);
            Route::get('/tambah', [\App\Http\Controllers\PenjualanController::class, 'tambah']);
            Route::get('/detail/{id}', [\App\Http\Controllers\PenjualanController::class, 'detail']);
            Route::post('/store', [\App\Http\Controllers\PenjualanController::class, 'store']);
        });
    });

    Route::middleware(['isAdmin'])->group(function (){
        Route::prefix('penjualan')->group(function (){
            Route::get('/report', [\App\Http\Controllers\PenjualanController::class, 'report']);
        });
        Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard']);
        Route::resource('references', \App\Http\Controllers\MstReferenceController::class);
        Route::resource('barang', \App\Http\Controllers\MstBarangController::class);
        Route::resource('users', \App\Http\Controllers\UserController::class);
    });
});
