<?php

use App\Http\Controllers\BookSearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBookController;
use Illuminate\Support\Facades\Route;

// **BOOKSEARCH**
Route::get('/', [BookSearchController::class, 'index'])->name('booksearch');

Route::get('results', [BookSearchController::class, 'show'])->name('results.show');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('results/{bookSearch}/{list}/{book}', [UserBookController::class, 'store'])->name('book.store');

    Route::get('list/{list}', [UserBookController::class, 'index'])->name('list.index');

    Route::get('book/{book}', [UserBookController::class, 'show'])->name('book.show');

    Route::delete('book/{book}', [UserBookController::class, 'destroy'])->name('book.destroy');

    Route::post('book/{book}/{list}', [UserBookController::class, 'update'])->name('book.update');

    // **PROFILE ROUTES**
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
