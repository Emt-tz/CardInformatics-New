<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;

//auth
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::post('/register', [AuthController::class, 'handleRegistration']);
Route::post('/otp', [OTPController::class, 'handleOTP']);
