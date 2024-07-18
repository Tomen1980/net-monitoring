<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlokController;
use App\Http\Controllers\IpAddressController;

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
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/update-profile', [AuthController::class, 'updateProfile']);
    // BLOK
    Route::get('/blok', [BlokController::class, 'index']);
    Route::get('/blok/form', [BlokController::class, 'create']);
    Route::post('/submit-blok', [BlokController::class, 'store']);
    Route::delete('/blok/delete/{id}', [BlokController::class, 'destroy']);
    Route::get('/blok/update/{id}', [BlokController::class, 'show']);
    Route::put('/update-blok', [BlokController::class, 'update']);

    // IP ADDRESS
    Route::get('/ipAddress', [IpAddressController::class, 'index']);
    Route::get('/ipAddress/create', [IpAddressController::class, 'create']);
    Route::post('/submit-ip', [IpAddressController::class, 'store']);
    Route::get('/ipAddress/update/{id}', [IpAddressController::class, 'show']);
    Route::put('/update-ip', [IpAddressController::class, 'update']);
    Route::delete('/ipAddress/delete/{id}', [IpAddressController::class, 'destroy']);
});
