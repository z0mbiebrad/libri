<?php

namespace App\Http\Controllers;

use App\Models\FinishedBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Http;

class FinishedBooksController extends Controller
{
    public function show()
    {
        $books = FinishedBooks::where('user_id', Auth::user()->id)->get();

        return view('finished', ['books' => $books]);
    }

    public function bookshow(FinishedBooks $book)
    {
        $book::where('user_id', Auth::user()->id)->get();
        return view('finished-book', ['book' => $book]);
    }

    public function store(Request $request)
    {

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes/' . $request->google_book_id);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $book = $bookData;

        try {
            FinishedBooks::create([
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
            //     // throw $th;
        }

        return view('book', ['book' => $book])->with('finished', 'Book added to finished reading list.');
    }

    public function destroy(FinishedBooks $book)
    {
        $book::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('finished')
            ->with('message', 'Book deleted successfully.');
    }
}
