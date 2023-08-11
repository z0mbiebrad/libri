<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookSearch;
use App\Http\Controllers\BookSearchController;
use App\Http\Controllers\CurrentBooksController;
use App\Http\Controllers\FinishedBooksController;
use App\Http\Controllers\WishlistBooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBookController;
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

Route::post('results/{book}', [BookController::class, 'store'])->name('book.store');


Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('finished', [UserBookController::class, 'index'])->name('finished.index');

    Route::get('finished/{book}', [FinishedBooksController::class, 'bookshow'])->name('finishedbook');

    Route::delete('finished/{book}', [FinishedBooksController::class, 'destroy'])->name('deleteFinishedBook');



    Route::get('current', [UserBookController::class, 'index'])->name('current.index');

    Route::get('current/{book}', [CurrentBooksController::class, 'bookshow'])->name('currentbook');

    Route::delete('current/{book}', [CurrentBooksController::class, 'destroy'])->name('deleteCurrentBook');

    Route::post('current/{book}', [CurrentBooksController::class, 'finishedTransfer'])->name('finished.transfer');


    Route::get('wishlist', [UserBookController::class, 'index'])->name('wishlist.index');

    Route::get('wishlist/{book}', [WishlistBooksController::class, 'bookshow'])->name('wishlistbook');

    Route::delete('wishlist/{book}', [WishlistBooksController::class, 'destroy'])->name('deleteWishlistBook');

    Route::post('wishlist/{book}', [WishlistBooksController::class, 'currentTransfer'])->name('current.transfer');


    // **PROFILE ROUTES**
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
