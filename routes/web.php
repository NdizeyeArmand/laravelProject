<?php

use App\Http\Controllers\FAQController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/dashboard', [ViewController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/FAQ', [FAQController::class, 'showFAQ'])->name('FAQ');

Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

Route::get('/about', [ViewController::class, 'about'])->name('about');

Route::get('/login', [ViewController::class, 'login'])->name('login');

Route::get('/main', [PostController::class, 'indexMain'])->name('main');
Route::get('/main/search', [PostController::class, 'search'])->name('main.search');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/tags/{slug}', [PostController::class, 'postsByTag'])->name('posts.by.tag');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
