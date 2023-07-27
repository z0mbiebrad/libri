<?php

use App\Http\Controllers\BookSearch;
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

Route::get('/book-search', [BookSearch::class, 'index'])->middleware(['auth', 'verified'])->name('booksearch');
Route::post('/book-search', [BookSearch::class, 'index'])->middleware(['auth', 'verified'])->name('results');
Route::get('/{book:id}', [BookSearch::class, 'book'])->middleware(['auth', 'verified'])->name('book');


Route::get('/finished', function () {
    return view('finished');
})->middleware(['auth', 'verified'])->name('finished');

Route::get('/currently-reading', function () {
    return view('unfinished');
})->middleware(['auth', 'verified'])->name('unfinished');

Route::get('/wishlist', function () {
    return view('wishlist');
})->middleware(['auth', 'verified'])->name('wishlist');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
