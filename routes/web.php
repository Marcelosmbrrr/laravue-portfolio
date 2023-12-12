<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Guest\HomeController;

Route::get('/', HomeController::class)->name('home');
Route::inertia('/login', 'Guest/Login')->name('login');

Route::middleware('auth')->group(function () {
    Route::inertia('/posts', 'Administration/Posts');
    Route::inertia('/projects', 'Administration/Projects');
    Route::inertia('/technologies', 'Administration/Technologies');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
