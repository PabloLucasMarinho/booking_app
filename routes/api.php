<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('/login', [TokenController::class, 'store'])->name('auth.store');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [TokenController::class, 'destroy'])->name('auth.destroy');
        Route::post('/logout-all', [TokenController::class, 'destroyAll'])->name('auth.destroyAll');

        Route::get('/me', [UserController::class, 'me'])->name('auth.me');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    });
});
