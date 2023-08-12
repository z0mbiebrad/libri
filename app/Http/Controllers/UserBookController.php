<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($list)
    {
        $books = UserBook::where('list', $list)->where('user_id', Auth::id())->get();
        return view('list', ['books' => $books]);
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
        if (UserBook::where('google_book_id', $book->google_book_id)->where('list', $list)->exists()) {
            return view('book-search.results-book', ['book' => $book])->with('message', 'This book is already in your ' . $message . ' reading list.');
        };
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

        return view('book-search.results-book', ['book' => $book])->with('message', 'Book added to ' . $message . ' reading list.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserBook $book)
    {
        return view('book', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserBook $book)
    {
        // if ($book::where('google_book_id', $book->google_book_id)->where('list', $book->list)->exists()) {
        //     return redirect()->route('book.show', ['book' => $book])->with('message', 'This book is already in your ' . $book->list . ' reading list.');
        // };
        if ($book->list === 'current') {
            $book->list = 'finished';
            $book->save();
            $list = 'current';
        }
        if ($book->list === 'wishlist') {
            $book->list = 'current';
            $book->save();
            $list = 'wishlist';
        }
        return redirect()->route('list.index', $list)->with('message', 'Book has been transferred to ' . $list . ' successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserBook $book)
    {
        $list = $book->list;
        $book->delete();

        return redirect()->route('list.index', $list)
            ->with('message', 'Book deleted from ' . $list . ' list successfully.');
    }
}
