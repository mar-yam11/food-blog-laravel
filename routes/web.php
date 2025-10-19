<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController; // For signin
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;


Route::get('/signin', [AuthController::class, 'showSignin'])->name('signin');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showUserProfile'])->name('user.profile');
    Route::get('/admin/profile', [ProfileController::class, 'showAdminProfile'])->name('admin.profile');
    // Route::get('/admin', [PostController::class, 'adminProfile'])->name('admin.profile');
    // Route::resource('posts', PostController::class);

    // Post routes (restricted to admins)
    Route::middleware('admin')->group(function () {
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });
});

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/404', fn() => view('404'))->name('404'); // Optional
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::get('/tags/{id}', [TagController::class, 'show'])->name('tag.show');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');




