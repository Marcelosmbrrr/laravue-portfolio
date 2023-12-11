<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SessionController;

Route::prefix('api')->group(function () {
    Route::post('/login', LoginController::class)->name('login');
    Route::middleware('auth')->group(function () {
        Route::post('/logout', LogoutController::class)->name('logout');
        Route::get('/session', SessionController::class)->name('session');
    });
});
