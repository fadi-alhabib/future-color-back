<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Booth\BoothController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::prefix("homes")->controller(HomeController::class)->group(function () {
    Route::get("/", "show");
    Route::post("/", "update")->middleware("auth:sanctum");
});

Route::prefix("categories")->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{category}', 'show');
    Route::delete('/{category}', 'destroy')->middleware("auth:sanctum");
    Route::put('/{category}', 'update')->middleware("auth:sanctum");
    Route::post('/', 'store')->middleware("auth:sanctum");
});

Route::prefix('projects')->controller(ProjectController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{project}', 'show');
    Route::delete('/{project}', 'destroy')->middleware("auth:sanctum");
    Route::put('/{project}', 'update')->middleware("auth:sanctum");
    Route::post('/', 'store')->middleware("auth:sanctum");
    Route::post('{project}/replace-image', 'replaceImage')->middleware("auth:sanctum");
});

Route::prefix("booths")->controller(BoothController::class)->group(function () {
    Route::get('/',  'index');
    Route::post('/',  'store')->middleware("auth:sanctum");
    // Route::delete('/{booth}',  'destroy');
    Route::post('/{booth}/replace-image',  'replaceImage')->middleware("auth:sanctum");
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});
