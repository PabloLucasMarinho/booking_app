<?php

use App\Http\Controllers\Api\TokenController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/hello', function () {
        return ['message' => 'Hello, API!'];
    });

    Route::post('/login', [TokenController::class, 'store'])->name('auth.store');
});
