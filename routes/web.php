<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookSearch;
use App\Http\Controllers\BookSearchController;
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


// **BOOKSEARCH**
Route::get('/', function () {
    return view('book-search.home');
})->name('booksearch');

Route::get('results', [BookSearchController::class, 'index'])->name('results.index');

Route::get('results/{book}', [BookSearchController::class, 'show'])->name('results.show');

Route::middleware(['auth', 'verified'])->group(function () {

    // **FINISHED ROUTES**
    Route::post('results/{book}', [BookController::class, 'store'])->name('book.store');

    Route::get('finished', [FinishedBooksController::class, 'show'])->name('finished');

    Route::get('finished/{book}', [FinishedBooksController::class, 'bookshow'])->name('finishedbook');

    Route::delete('finished/{book}', [FinishedBooksController::class, 'destroy'])->name('deleteFinishedBook');


    // **CURRENT ROUTES**
    Route::post('results/current', [CurrentBooksController::class, 'store'])->name('addCurrent');

    Route::get('current', [CurrentBooksController::class, 'show'])->name('current');

    Route::get('current/{book}', [CurrentBooksController::class, 'bookshow'])->name('currentbook');

    Route::delete('current/{book}', [CurrentBooksController::class, 'destroy'])->name('deleteCurrentBook');

    Route::post('current/{book}', [CurrentBooksController::class, 'finishedTransfer'])->name('finished.transfer');


    // **WISHLIST ROUTES**
    Route::post('results/wishlist', [WishlistBooksController::class, 'store'])->name('addWishlist');

    Route::get('wishlist', [WishlistBooksController::class, 'show'])->name('wishlist');

    Route::get('wishlist/{book}', [WishlistBooksController::class, 'bookshow'])->name('wishlistbook');

    Route::delete('wishlist/{book}', [WishlistBooksController::class, 'destroy'])->name('deleteWishlistBook');

    Route::post('wishlist/{book}', [WishlistBooksController::class, 'currentTransfer'])->name('current.transfer');


    // **PROFILE ROUTES**
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
