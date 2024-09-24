<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckingAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);
Route::get('/login',function(){
  return  view('auth.login');
})->name('auth.login');
Route::post('/login',[UserController::class,'signup'])->name('auth.signup');

Route::middleware([CheckingAuth::class])->group(function(){
    Route::resource('/posts',PostController::class)->except(['index','show']);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::resource('/posts/categories',CategoryController::class)->middleware(CheckingAuth::class);

// Route::resource('/posts/tags',TagController::class);


