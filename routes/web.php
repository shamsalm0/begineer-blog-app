<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckingAuth;
use Illuminate\Support\Facades\Route;
 
// Home Route
Route::get('/', [PostController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', function() {
    return view('auth.login');
})->name('auth.login');

Route::post('/login', [LoginController::class, 'login'])->name('auth.signin'); // Correct action for login
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.signout');
Route::get('/register', function() {
    return view('auth.register');
})->name('auth.register');
Route::post('/register', [LoginController::class, 'signup'])->name('auth.signup'); // Correct action for signup

// Admin Routes
Route::prefix('admin')->middleware(CheckingAuth::class)->group(function() {
    Route::resource('/posts', PostController::class)->except(['index', 'show']);
});

// Post Routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show')->missing(function(){
    return view('posts.index');
});

// Category Routes with Middleware
Route::prefix('posts')->middleware(CheckingAuth::class)->group(function () {
  Route::resource('/categories', CategoryController::class);
});

// If tags functionality is needed later, you can uncomment the route
Route::resource('/tags', TagController::class);

Route::resource('comments',CommentController::class);
