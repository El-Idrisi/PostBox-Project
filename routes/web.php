<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FreshController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

//! Home & Fresh Page
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('Home');

Route::get('/fresh', [FreshController::class, 'index'])->middleware('auth')->name('fresh');
//! END Home & Fresh Page


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

Route::post('/profile/{user}/follow', [ProfileController::class, 'follow'])->name('profile.follow');

Route::delete('/profile/{user}/unfollow', [ProfileController::class, 'unfollow'])->name('profile.unfollow');
//! END Profile


//! Post
Route::get('/Postbox', [PostController::class, 'postbox'])->middleware('auth')->name('Postbox');

Route::post('/Postbox', [PostController::class, 'post'])->middleware('auth')->name('postbox.post');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts/{post}/comment', [PostController::class, 'addComment'])->name('posts.comment');
//! END Post


// ! Search
Route::get('/search', [SearchController::class, 'index'])->middleware('auth')->name('search');

Route::get('/search/result', [SearchController::class, 'search'])->middleware('auth')->name('search.result');
// ! END Search


Route::get('/notification', [NotificationController::class, 'index'])->middleware('auth')->name('notification');

Route::post('/notifications/{notification}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

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





// ! Login and Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login.submit');
Route::post('/register', [AuthController::class,'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// ! Login and Register

