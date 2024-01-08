<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Administration\PostsController;
use App\Http\Controllers\v1\Administration\ProjectsController;
use App\Http\Controllers\v1\Administration\TechnologiesController;

Route::prefix('api')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::apiResource('/posts', PostsController::class);
        Route::apiResource('/projects', ProjectsController::class);
        Route::apiResource('/techs', TechnologiesController::class);
    });
});
