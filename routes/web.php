<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('Home');

Route::get('/fresh', function () {
    return view('fresh');
})->name('fresh');

Route::get('/notification', function () {
    return view('notification');
})->name('notification');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/Postbox', function () {
    return view('Postbox');
})->name('Postbox');

Route::get('/profile/edit', function () {
    return view('editprofile');
})->name('editprofile');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::post('/profile/update', function () {
    // Logika update profil (belum diimplementasikan)
    return redirect()->route('profile.edit');
})->name('profile.update');


Route::get('/profile/settings', function () {
    return view('settings');
})->name('settings');

Route::post('/settings/update', function () {
    // Logika update settings (belum diimplementasikan)
    return redirect()->route('settings');
})->name('settings.update');