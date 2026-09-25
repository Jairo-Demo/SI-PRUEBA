<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('LoginIndex');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:admin')->get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');