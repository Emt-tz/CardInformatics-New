<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\CreditOffersController;

//auth
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::post('/register', [AuthController::class, 'handleRegistration']);
Route::post('/otp', [OTPController::class, 'handleOTP']);
// user
Route::put('/user/complete_registration',[UserController::class, 'handleCompleteRegistration']);
Route::get('/user/{email}', [UserController::class, 'handleGetUserByEmail']);
Route::post('/user/update_profile', [UserController::class, 'handleUpdateProfile']);
Route::post('/user/update_picture', [UserController::class, 'handleUpdatePicture']);
Route::post('/user/update_password', [UserController::class, 'handleUpdatePassword']);
Route::post('/user/update_security_question', [UserController::class, 'handleUpdateSecurityQuestion']);
// loan
Route::post('/loan/apply',[LoanController::class, 'handleLoanApplication']);
Route::get('/loan/form', [LoanController::class, 'handleLoadLoanForm']);
Route::get('/loan/{email}',[LoanController::class, 'handleGetUserLoans']);
Route::get('/loan/{email}?loan_status=Approved',[LoanController::class, 'handleGetUserLoans']);
// credit offers
Route::get('/credit/offers', [CreditOffersController::class, 'handleLoadCreditOffers']);
