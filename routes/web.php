<?php

use App\Http\Controllers\CacheController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    // ->middleware('auth');

// register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('/posts/{post}/update', [PostController::class, 'update'])->name('post.update');

/* Route::get('/likes', [PostController::class, 'likes']); */

// Likes and Unlikes
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

// User Post Page
Route::get('/user/{user}/posts', [UserPostController::class, 'index'])->name('user.posts');

// Archive Delete Post parts of user
Route::get('/posts/{user}/archive', [PostController::class, 'archive'])->name('user.archive');
Route::post('/posts/{post}/restore', [PostController::class, 'restore'])->name('user.restore')->withTrashed();
Route::delete('/post/{post}/delete', [PostController::class, 'deleteForever'])->name('user.deleteForever')->withTrashed();

// Change platform language
Route::get('/language/{lang}', [LanguageController::class, 'change_lang'])->name('change_lang');

// Notification
Route::get('/newpost/{user}/notification', [NotificationController::class, 'index'])->name('user.notification');
Route::get('/newpost/{notification}/read', [NotificationController::class, 'read'])->name('user.read');


Route::get('/cache', [CacheController::class, 'index']);

Route::get('/lock', [UserPostController::class, 'testLock']);
