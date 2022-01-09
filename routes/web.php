<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [PostController::class, 'index']);

Route::get('posts/{category:name}', [PostController::class, 'category']);
Route::get('post/{post:slug}', [PostController::class, 'detail']);

Route::get('author/{user:username}', [UserController::class, 'posts']);

Route::get('login/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login/', [LoginController::class, 'authentication']);
// Route::post('logout/', [LoginController::class], 'logout');
Route::post('logout/', 'App\Http\Controllers\LoginController@logout');

Route::get('register/', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('register/', [RegisterController::class, 'store']);

Route::get('dashboard/', function() {
    return view('dashboard.index', [
        'title' => 'Dashboard',
    ]);
})->middleware('auth');
