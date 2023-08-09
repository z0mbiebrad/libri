<?php

namespace App\Http\Controllers;

use App\Models\CurrentBooks;
use App\Models\FinishedBooks;
use App\Models\WishlistBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Http;
use PHPUnit\Event\Application\Finished;

class FinishedBooksController extends Controller
{
    public function show()
    {
        $books = FinishedBooks::where('user_id', Auth::id())->get();

        return view('finished', ['books' => $books]);
    }

    public function bookshow(FinishedBooks $book)
    {
        $key = config('services.google_api');
        dd($book);
        try {
            if (Auth::id()  === $book->user_id) {
                return view('finished-book', ['book' => $book]);
            } else {
                $book = $book->title;

                $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes?q=' . $book . '&key' . $key);
                $bookResults = $bookResponse->body();
                $bookData = json_decode($bookResults);
                $books = $bookData->items;

                return view('results', ['books' => $books]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        $key = config('services.google_api');

        if ($request->finished_google_book_id) {
            $google_book_id = $request->finished_google_book_id;
            $list = new FinishedBooks;
            $message = 'finished';
        }
        if ($request->current_google_book_id) {
            $google_book_id = $request->current_google_book_id;
            $list = new CurrentBooks;
            $message = 'current';
        }
        if ($request->wishlist_google_book_id) {
            $google_book_id = $request->wishlist_google_book_id;
            $list = new WishlistBooks;
            $message = 'wishlist';
        }

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes/' . $google_book_id . '?key=' . $key);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $book = $bookData;

        try {
            $list::create([
                'user_id' => Auth::id(),
                'thumbnail' => $book->volumeInfo->imageLinks->thumbnail ?? null,
                'title' => $book->volumeInfo->title ?? null,
                'subtitle' => $book->volumeInfo->subtitle ?? null,
                'authors' => $book->volumeInfo->authors[0] ?? null,
                'categories' => $book->volumeInfo->categories[0] ?? null,
                'rating' => $book->volumeInfo->averageRating ?? null,
                'published_date' => $book->volumeInfo->publishedDate ?? null,
                'description' => $book->volumeInfo->description ?? null,
                'publisher' => $book->volumeInfo->publisher ?? null,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        return view('book', ['book' => $book])->with('finished', 'Book added to ' . $message . ' reading list.');
    }

    public function destroy(FinishedBooks $book)
    {
        try {
            if (Auth::id()  === $book->user_id) {
                $book->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('finished')
            ->with('message', 'Book deleted successfully.');
    }
}
