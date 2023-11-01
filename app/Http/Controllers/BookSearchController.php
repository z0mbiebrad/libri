<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $key = config('services.google_api');

        $book = $request->input('bookSearch');

        $bookResponse = Http::get('https://www.googleapis.com/books/v1/volumes?q=' . $book . '&key=' . $key);
        $google_books = json_decode($bookResponse);

        foreach ($google_books->items as $book) {
            $books[] = Book::updateOrCreate([
                'google_book_id' => $book->id,
                'thumbnail' => $book->volumeInfo->imageLinks->thumbnail ?? null,
                'title' => $book->volumeInfo->title ?? null,
                'subtitle' =>  $book->volumeInfo->subtitle ?? null,
                'authors' => $book->volumeInfo->authors[0] ?? null,
                'categories' => $book->volumeInfo->categories[0] ?? null,
                'rating' => $book->volumeInfo->averageRating ?? null,
                'published_date' => date('Y', strtotime($book->volumeInfo->publishedDate ?? null)),
                'description' => $book->volumeInfo->description ?? null,
                'publisher' => $book->volumeInfo->publisher ?? null,
            ]);
        }

        return view('book-search.results-list', ['books' => $books]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book-search.results-book', ['book' => $book]);
    }
}
