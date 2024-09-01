<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'home'])->middleware('auth')->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login.submit');
Route::post('/register', [AuthController::class,'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

