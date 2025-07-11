<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleBookController;

Route::get('/', [BookController::class, 'home'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Admin Login
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/admin/dashboard', [BookController::class, 'adminDashboard'])->middleware('admin')->name('admin.dashboard');

// Admin Book Management
Route::resource('admin/books', BookController::class)
    ->except(['show'])
    ->names('admin.books');




Route::get('/google-books', [GoogleBookController::class, 'index'])->name('google.books');
Route::get('/google-books/search', [GoogleBookController::class, 'search'])->name('google.books.search');

