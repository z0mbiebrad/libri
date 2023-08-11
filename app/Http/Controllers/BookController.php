<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Book $book, Request $request)
    {
        if ($request->finished_google_book_id) {
            $list = 'finished';
            $message = 'finished';
        }
        if ($request->current_google_book_id) {
            $list = 'current';
            $message = 'current';
        }
        if ($request->wishlist_google_book_id) {
            $list = 'wishlist';
            $message = 'wishlist';
        }
        try {
            UserBook::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'list' => $list,
                'google_book_id' => $book->google_book_id,
                'thumbnail' => $book->thumbnail ?? null,
                'title' => $book->title ?? null,
                'subtitle' => $book->subtitle ?? null,
                'authors' => $book->authors ?? null,
                'categories' => $book->categories ?? null,
                'rating' => $book->averageRating ?? null,
                'published_date' => $book->published_date ?? null,
                'description' => $book->description ?? null,
                'publisher' => $book->publisher ?? null,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        return view('book-search.results-book', ['book' => $book])->with('current', 'Book added to ' . $message . ' reading list.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        try {
        } catch (\Throwable $th) {
            //throw $th;
        }

        $book->delete();

        return redirect()->route('current')
            ->with('message', 'Book transfer to finished reading successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('current')
            ->with('message', 'Book deleted successfully.');
    }
}
