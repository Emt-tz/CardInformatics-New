<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;

//auth
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::post('/register', [AuthController::class, 'handleRegistration']);
Route::post('/otp', [OTPController::class, 'handleOTP']);
// user
Route::put('/user/complete_registration',[UserController::class, 'handleCompleteRegistration']);
Route::put('/user/update_profile', [UserController::class, 'handleUpdateProfile']);
Route::post('/user/update_picture', [UserController::class, 'handleUpdatePicture']);
Route::put('/user/update_password', [UserController::class, 'handleUpdatePassword']);
Route::put('/user/update_security_question', [UserController::class, 'handleUpdateSecurityQuestion']);
// loan
Route::post('/loan/apply',[LoanController::class, 'handleLoanApplication']);
