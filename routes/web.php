<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rute untuk menampilkan halaman login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses login
Route::post('login', [AuthController::class, 'login']);

// Rute untuk menampilkan halaman registrasi
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');

// Rute untuk memproses registrasi
Route::post('register', [AuthController::class, 'register']);

// Rute untuk halaman dashboard (halaman yang dapat diakses setelah login)
Route::get('dashboard', function () {
    return 'Welcome to your dashboard';
})->middleware('auth');
