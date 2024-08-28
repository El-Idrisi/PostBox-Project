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

