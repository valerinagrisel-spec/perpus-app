<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return redirect('/login');
});

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Buku bisa dilihat admin dan member
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    // Peminjaman
    Route::post('/borrow/{book}', [BorrowingController::class, 'store'])->name('borrow.store');
    Route::get('/my-borrowings', [BorrowingController::class, 'myBorrowings'])->name('borrow.my');

    // Sementara fitur admin kita taruh di sini dulu
    Route::resource('/categories', CategoryController::class);

    Route::get('/admin/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/admin/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/admin/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/admin/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/admin/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrow.index');
    Route::put('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrow.return');
});
