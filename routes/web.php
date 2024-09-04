<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FreshController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('Home');
Route::get('/fresh', [FreshController::class, 'index'])->middleware('auth')->name('fresh');
Route::get('/notification', [RouteController::class, 'notification'])->middleware('auth')->name('notification');
Route::get('/Postbox', [RouteController::class, 'postbox'])->middleware('auth')->name('Postbox');
Route::get('/search', [RouteController::class, 'search'])->middleware('auth')->name('search');

Route::get('/profile/{username}', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');

Route::get('/profile/{username}/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');

Route::put('/profile/{username}', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');



Route::get('/profile/edit', function () {
    return view('editprofile');
})->name('editprofile');


// Route::post('/profile/update', function () {
//     // Logika update profil (belum diimplementasikan)
//     return redirect()->route('profile.edit');
// })->middleware('auth')->name('profile.update');


Route::get('/profile/settings', function () {
    return view('settings');
})->middleware('auth')->name('settings');

Route::post('/settings/update', function () {
    // Logika update settings (belum diimplementasikan)
    return redirect()->route('settings');
})->middleware('auth')->name('settings.update');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login.submit');
Route::post('/register', [AuthController::class,'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

