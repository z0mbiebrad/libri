<?php

use App\Http\Controllers\BookSearch;
use App\Http\Controllers\CurrentBooksController;
use App\Http\Controllers\FinishedBooksController;
use App\Http\Controllers\WishlistBooksController;
use App\Http\Controllers\ProfileController;
use App\Models\FinishedBooks;
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

    Route::post('results/f/{book:id}', [FinishedBooksController::class, 'store'])->name('addFinished');

    Route::get('finished', [FinishedBooksController::class, 'show'])->name('finished');

    Route::get('finished/{book:id}', [FinishedBooksController::class, 'bookshow'])->name('finishedbook');

    Route::post('results/c/{book:id}', [CurrentBooksController::class, 'store'])->name('addCurrent');

    Route::get('current', [CurrentBooksController::class, 'show'])->name('current');

    Route::get('current/{book:id}', [CurrentBooksController::class, 'bookshow'])->name('currentbook');

    Route::post('results/w/{book:id}', [WishlistBooksController::class, 'store'])->name('addWishlist');
});



Route::get('wishlist', function () {
    return view('wishlist');
})->middleware(['auth', 'verified'])->name('wishlist');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
