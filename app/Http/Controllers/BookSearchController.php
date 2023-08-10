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
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $books = $bookData->items;

        try {
            foreach ($books as $book) {
                Book::create([
                    'google_book_id' => $book->id,
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
            }
        } catch (\Throwable $th) {
            // return $th;
        }

        return view('book-search.results-list', ['books' => $books]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::where('google_book_id', $id)->first();

        return view('book-search.results-book', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
