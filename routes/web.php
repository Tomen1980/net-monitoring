<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['LoginProtect'])->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'loginAction']);
    Route::post('/register', [AuthController::class, 'registerAction']);
});


Route::middleware(['RedirectAuth'])->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/ListBlok', [AuthController::class, 'ListBlok']);
});
