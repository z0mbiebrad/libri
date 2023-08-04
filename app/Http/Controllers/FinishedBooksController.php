<?php

namespace App\Http\Controllers;

use App\Models\FinishedBooks;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class FinishedBooksController extends Controller
{
    public function show()
    {
        $books = Finishedbooks::all();

        return view('finished', ['books' => $books]);
    }

    public function bookshow(FinishedBooks $book)
    {
        return view('finished-book', ['book' => $book]);
    }

    public function store(Request $request)
    {

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes/' . $request->google_book_id);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $book = $bookData;

        // try {
        FinishedBooks::create([
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
        // } catch (\Throwable $th) {
        //     // throw $th;
        // }

        return view('book', ['book' => $book])->with('finished', 'Book added to finished reading list.');
    }

    public function destroy(FinishedBooks $book)
    {
        $book->delete();

        return redirect()->route('finished')
            ->with('message', 'Book deleted successfully.');
    }
}
