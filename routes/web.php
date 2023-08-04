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

    // **BOOKSEARCH**
    Route::get('book-search', [BookSearch::class, 'index'])->name('booksearch');

    Route::get('results', [BookSearch::class, 'show'])->name('results');

    Route::get('results/{book:id}', [BookSearch::class, 'book'])->name('book');

    // **FINISHED ROUTES**
    Route::post('results/finished', [FinishedBooksController::class, 'store'])->name('addFinished');

    Route::get('finished', [FinishedBooksController::class, 'show'])->name('finished');

    Route::get('finished/{book}', [FinishedBooksController::class, 'bookshow'])->name('finishedbook');

    Route::delete('finished/{book}', [FinishedBooksController::class, 'destroy'])->name('deleteFinishedBook');

    // **CURRENT ROUTES**
    Route::post('results/c/{book:id}', [CurrentBooksController::class, 'store'])->name('addCurrent');

    Route::get('current', [CurrentBooksController::class, 'show'])->name('current');

    Route::get('current/{book:id}', [CurrentBooksController::class, 'bookshow'])->name('currentbook');

    Route::delete('current/delete/{book:id}', [CurrentBooksController::class, 'destroy'])->name('deleteCurrentBook');

    Route::post('current/transfer/{book:id}', [CurrentBooksController::class, 'finishedTransfer'])->name('finished.transfer');


    // **WISHLIST ROUTES**
    Route::post('results/w/{book:id}', [WishlistBooksController::class, 'store'])->name('addWishlist');

    Route::get('wishlist', [WishlistBooksController::class, 'show'])->name('wishlist');

    Route::get('wishlist/{book:id}', [WishlistBooksController::class, 'bookshow'])->name('wishlistbook');

    Route::delete('wishlist/delete/{book:id}', [WishlistBooksController::class, 'destroy'])->name('deleteWishlistBook');

    Route::post('wishlist/transfer/{book:id}', [WishlistBooksController::class, 'currentTransfer'])->name('current.transfer');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
