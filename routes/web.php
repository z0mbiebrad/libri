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


Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('results/{list}/{book}', [UserBookController::class, 'store'])->name('book.store');

    Route::get('list/{list}', [UserBookController::class, 'index'])->name('list.index');

    Route::get('book/{book}', [UserBookController::class, 'show'])->name('book.show');

    Route::delete('book/{book}', [UserBookController::class, 'destroy'])->name('book.destroy');

    Route::post('book/{book}', [UserBookController::class, 'update'])->name('book.update');

    Route::post('wishlist/{book}', [WishlistBooksController::class, 'currentTransfer'])->name('current.transfer');

    // **PROFILE ROUTES**
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
