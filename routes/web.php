<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/fresh', function () {
    return view('fresh');
})->middleware('auth')->name('fresh');

Route::get('/notification', function () {
    return view('notification');
})->middleware('auth')->name('notification');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::get('/Postbox', function () {
    return view('postbox');
})->middleware('auth')->name('Postbox');

Route::get('/profile/edit', function () {
    return view('editprofile');
})->middleware('auth')->name('editprofile');

Route::get('/search', function () {
    return view('search');
})->middleware('auth')->name('search');

Route::post('/profile/update', function () {
    // Logika update profil (belum diimplementasikan)
    return redirect()->route('profile.edit');
})->middleware('auth')->name('profile.update');


Route::get('/profile/settings', function () {
    return view('settings');
})->middleware('auth')->name('settings');

Route::post('/settings/update', function () {
    // Logika update settings (belum diimplementasikan)
    return redirect()->route('settings');
})->middleware('auth')->name('settings.update');


Route::get('/', [AuthController::class, 'home'])->middleware('auth')->name('Home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login.submit');
Route::post('/register', [AuthController::class,'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

