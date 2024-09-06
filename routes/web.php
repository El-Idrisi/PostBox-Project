<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FreshController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

//! Home & Fresh Page
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('Home');

Route::get('/fresh', [FreshController::class, 'index'])->middleware('auth')->name('fresh');
//! END Home & Fresh Page

Route::get('/notification', [RouteController::class, 'notification'])->middleware('auth')->name('notification');

Route::get('/search', [RouteController::class, 'search'])->middleware('auth')->name('search');

//! Profile
Route::get('/profile/{username}', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');

Route::get('/profile/{username}/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');

Route::put('/profile/{username}', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

Route::get('/profile/{username}/settings', [ProfileController::class, 'setting'])->middleware('auth')->name('profile.setting');

Route::get('/profile/{username}/settings/change-password', [ProfileController::class, 'show_change_pass'])->middleware('auth')->name('profile.show_change_password');

Route::get('/profile/{username}/settings/change-email', [ProfileController::class, 'showChangeEmail'])->middleware('auth')->name('profile.show_change_email');

Route::get('/profile/{username}/settings/delete', [ProfileController::class, 'showDeleteAccount'])->middleware('auth')->name('profile.show_delete');

Route::post('/profile/{username}/changeEmail', [ProfileController::class, 'changeEmail'])->middleware('auth')->name('profile.change_email');

Route::post('profile/{username}/changePassword', [ProfileController::class, 'changePassword'])->middleware('auth')->name('profile.change_password');

Route::post('/', [ProfileController::class, 'delete'])->middleware('auth')->name('profile.delete');
//! END Profile

//! Post
Route::get('/Postbox', [PostController::class, 'postbox'])->middleware('auth')->name('Postbox');

Route::post('/Postbox', [PostController::class, 'post'])->middleware('auth')->name('postbox.post');
//! END Post

// Route::get('/profile/edit', function () {
//     return view('editprofile');
// })->name('editprofile');


// Route::post('/profile/update', function () {
//     // Logika update profil (belum diimplementasikan)
//     return redirect()->route('profile.edit');
// })->middleware('auth')->name('profile.update');

Route::get('/tests', function () {
    return view('test');
})->name('test');



Route::post('/settings/update', function () {
    // Logika update settings (belum diimplementasikan)
    return redirect()->route('settings');
})->middleware('auth')->name('settings.update');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login.submit');
Route::post('/register', [AuthController::class,'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

