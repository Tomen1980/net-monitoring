<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlokController;
use App\Http\Controllers\IpAddressController;
use App\Http\Controllers\LoggerController;

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
    Route::get('/ListBlok', [BlokController::class, 'ListBlok']);
    Route::get('/blok', [BlokController::class, 'index'])->middleware('AdminRoute');
    Route::get('/blok/form', [BlokController::class, 'create'])->middleware('AdminRoute');
    Route::post('/submit-blok', [BlokController::class, 'store'])->middleware('AdminRoute');
    Route::delete('/blok/delete/{id}', [BlokController::class, 'destroy'])->middleware('AdminRoute');
    Route::get('/blok/update/{id}', [BlokController::class, 'show'])->middleware('AdminRoute');
    Route::put('/update-blok', [BlokController::class, 'update'])->middleware('AdminRoute');

    // IP ADDRESS
    Route::get('/ipAddress', [IpAddressController::class, 'index'])->middleware('AdminRoute');
    Route::get('/ipAddress/create', [IpAddressController::class, 'create'])->middleware('AdminRoute');
    Route::post('/submit-ip', [IpAddressController::class, 'store'])->middleware('AdminRoute');
    Route::get('/ipAddress/update/{id}', [IpAddressController::class, 'show'])->middleware('AdminRoute');
    Route::put('/update-ip', [IpAddressController::class, 'update'])->middleware('AdminRoute');
    Route::delete('/ipAddress/delete/{id}', [IpAddressController::class, 'destroy'])->middleware('AdminRoute');

    // Monitoring
    Route::get('/list-monitoring', [BlokController::class, 'getListMonitoring']);
    Route::get('/monitoring/ip/{id}', [IpAddressController::class, 'showMonitoring']);


    // Logger 
    Route::get('/logger', [LoggerController::class, 'index']);
    Route::delete('/logger/delete/{id}', [LoggerController::class, 'destroy']);
    Route::delete('/logger/destroyAll',[LoggerController::class, 'destroyAll']);
    
});
