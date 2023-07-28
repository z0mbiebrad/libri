<?php

use App\Http\Controllers\BookSearch;
use App\Http\Controllers\CurrentBooksController;
use App\Http\Controllers\FinishedBooksController;
use App\Http\Controllers\WishlistBooksController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('book-search', [BookSearch::class, 'index'])->name('booksearch');

    Route::get('results', [BookSearch::class, 'show'])->name('results');

    Route::get('results/{book:id}', [BookSearch::class, 'book'])->name('book');

    Route::get('results/f/{book:id}', [FinishedBooksController::class, 'store'])->name('addFinished');

    Route::get('results/c/{book:id}', [CurrentBooksController::class, 'store'])->name('addCurrent');

    Route::get('results/w/{book:id}', [WishlistBooksController::class, 'store'])->name('addWishlist');
});


Route::get('finished', function () {
    return view('finished');
})->middleware(['auth', 'verified'])->name('finished');

Route::get('currently-reading', function () {
    return view('unfinished');
})->middleware(['auth', 'verified'])->name('unfinished');

Route::get('wishlist', function () {
    return view('wishlist');
})->middleware(['auth', 'verified'])->name('wishlist');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
