<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Guest/Home')->name('home');
Route::inertia('/login', 'Guest/Login')->name('login');

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Authenticated/Dashboard');
    Route::inertia('/profile', 'Authenticated/Profile');
    Route::inertia('/projects', 'Authenticated/Projects');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
