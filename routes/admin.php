<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Administration\PostsController;
use App\Http\Controllers\v1\Administration\ProjectsController;
use App\Http\Controllers\v1\Administration\TechnologiesController;

Route::middleware('auth')->group(function () {

    // admin pages
    Route::inertia('/posts', 'Administration/Posts');
    Route::inertia('/projects', 'Administration/Projects');
    Route::inertia('/technologies', 'Administration/Technologies');
    Route::get('/posts/create', [PostsController::class, "create"]);
    Route::get('/posts/{uuid}/edit', [PostsController::class, "edit"]);

    // admin api
    Route::prefix('api')->group(function () {
        Route::apiResource('/posts', PostsController::class);
        Route::apiResource('/projects', ProjectsController::class);
        Route::apiResource('/techs', TechnologiesController::class);
    });
});
