<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageUploadController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\Author\PostController as AuthorPostController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboardController;

Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name('image.upload');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{slug}/related', [PostController::class, 'getRelatedPosts']);
Route::get('/posts/archive/{year}/{month}', [PostController::class, 'archive'])->name('posts.archive');
Route::get('/posts/category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('tags', AdminTagController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('profile', AdminProfileController::class)->only(['edit', 'update']);
});

Route::middleware('auth')->prefix('author')->group(function () {
    Route::get('dashboard', [AuthorDashboardController::class, 'index'])->name('author.dashboard');
    // Custom routes for author posts
    Route::get('posts', [AuthorPostController::class, 'index'])->name('author.posts');
    Route::get('posts/create', [AuthorPostController::class, 'create'])->name('author.posts.create');
    Route::post('posts', [AuthorPostController::class, 'store'])->name('author.posts.store');
    Route::get('posts/{post}', [AuthorPostController::class, 'show'])->name('author.posts.show');
    Route::get('posts/{post}/edit', [AuthorPostController::class, 'edit'])->name('author.posts.edit');
    Route::patch('posts/{post}', [AuthorPostController::class, 'update'])->name('author.posts.update');
    Route::delete('posts/{post}', [AuthorPostController::class, 'destroy'])->name('author.posts.destroy');

    Route::get('profile', [ProfileController::class, 'show'])->name('author.profile');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('author.profile.edit');
    Route::patch('profile/update', [ProfileController::class, 'update'])->name('author.profile.update');
});

require __DIR__ . '/auth.php';
