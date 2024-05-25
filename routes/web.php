<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/home', [PostController::class, 'index'])->name('home')->middleware('isLogin');

Route::middleware(['isLogin', 'member'])->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('post_tweet');
    Route::get('/posts/{post_id}', [PostController::class, 'show'])->name('show_tweet');
});

Route::middleware(['isLogin', 'admin'])->group(function () {
    Route::delete('/posts/{post_id}', [PostController::class, 'destroy'])->name('post_destroy');
    Route::get('/posts/{post_id}/edit', [PostController::class, 'edit'])->name('edit_tweet');
    Route::put('/posts/{post_id}/edit/update', [PostController::class, 'update'])->name('update_tweet');
});

Route::get('/', [UserController::class , 'login_page'])->name('login_page');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register_page', [UserController::class, 'register_page'])->name('register_page');
Route::post('/register', [UserController::class, 'register'])->name('register');


    // Route::delete('/posts/{post_id}', [PostController::class, 'destroy'])->name('post_destroy');
    // Route::get('/posts/{post_id}/edit', [PostController::class, 'edit'])->name('edit_tweet');
    // Route::put('/posts/{post_id}/edit/update', [PostController::class, 'update'])->name('update_tweet');

    // Route::post('/posts', [PostController::class, 'store'])->name('post_tweet');
    // Route::get('/posts/{post_id}', [PostController::class, 'show'])->name('show_tweet');
    // Route::get('/home', [PostController::class, 'index'])->name('home')->middleware('isLogin');

    // Route::get('/', [UserController::class , 'login_page'])->name('login_page');
    // Route::post('/login', [UserController::class, 'login'])->name('login');

    // Route::get('/register_page', [UserController::class, 'register_page'])->name('register_page');
    // Route::post('/register', [UserController::class, 'register'])->name('register');



