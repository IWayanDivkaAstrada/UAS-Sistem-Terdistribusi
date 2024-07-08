<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\PenulisController;
use App\Http\Controllers\API\PeminjamanController;
use App\Http\Controllers\API\NewPasswordController;



Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);


Route::middleware('auth:sanctum')->group(function () {
    
    Route::apiResource('bukus', BukuController::class);

    Route::apiResource('penulis', PenulisController::class);
    
    Route::apiResource('peminjamans', PeminjamanController::class);
});

