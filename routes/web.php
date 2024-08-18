<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserAvatarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/admin', [ProfileController::class, 'showAdmin'])->name('profile.admin');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/user/avatar', [UserAvatarController::class, 'update'])->name('user-avatar.update');
    Route::get('/user/{username}', [ProfileController::class, 'showPublicProfile'])->name('profile.show');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware(['auth', 'can:manage-faq'])->group(function () {
    Route::post('/faq/category', [FAQController::class, 'addCategory'])->name('faq.categories.create');
    Route::put('/faq/category/{category}', [FAQController::class, 'editCategory'])->name('faq.categories.edit');
    Route::delete('/faq/category/{category}', [FAQController::class, 'deleteCategory'])->name('faq.categories.destroy');
    Route::post('/faq/item', [FAQController::class, 'addItem'])->name('faq.items.create');
    Route::put('/faq/item/{item}', [FAQController::class, 'editItem'])->name('faq.items.edit');
    Route::delete('/faq/item/{item}', [FAQController::class, 'deleteItem'])->name('faq.items.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/update-status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/random', [PostController::class, 'random'])->name('posts.random');

Route::get('/dashboard', [ViewController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/FAQ', [FAQController::class, 'showFAQ'])->name('FAQ');

Route::get('/contact', [ViewController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.messages.index');

Route::get('/about', [ViewController::class, 'about'])->name('about');

Route::get('/login', [ViewController::class, 'login'])->name('login');

Route::get('/main', [PostController::class, 'indexMain'])->name('main');
Route::get('/main/search', [PostController::class, 'search'])->name('main.search');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');
Route::get('/tags/{slug}', [PostController::class, 'postsByTag'])->name('posts.by.tag');

Route::get('/users/{user}', [ProfileController::class, 'showPublicProfile'])->name('profile.show');

require __DIR__.'/auth.php';
