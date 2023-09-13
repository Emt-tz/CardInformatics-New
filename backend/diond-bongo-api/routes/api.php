<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//auth
Route::post('/login', [AuthController::class, 'handleLogin']);
