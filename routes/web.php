<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard']);


Route::prefix('auth')->group(function (){
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index']);
    Route::post('/doLogin', [\App\Http\Controllers\AuthController::class, 'doLogin']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});
