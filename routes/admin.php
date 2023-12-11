<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Guest\ProjectController;
use App\Http\Controllers\v1\Administration\DashboardController;
use App\Http\Controllers\v1\Administration\PostsController;
use App\Http\Controllers\v1\Administration\ProfileController;
use App\Http\Controllers\v1\Administration\ProjectsController;

Route::get('/project/{id}', ProjectController::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::apiResource('/posts', PostsController::class);
    Route::apiResource('/projects', ProjectsController::class);
    Route::apiResource('/profile', ProfileController::class);
});