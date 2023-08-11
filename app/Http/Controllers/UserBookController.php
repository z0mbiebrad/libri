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
        if ($list === 'finished') {
            $books = UserBook::where('list', 'finished')->where('user_id', Auth::id())->get();
            return view('list', ['books' => $books]);
        }
        if ($list === 'current') {
            $books = UserBook::where('list', 'current')->where('user_id', Auth::id())->get();
            return view('list', ['books' => $books]);
        }
        if ($list === 'wishlist') {
            $books = UserBook::where('list', 'wishlist')->where('user_id', Auth::id())->get();
            return view('list', ['books' => $books]);
        }
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
            return view('book-search.results-book', ['book' => $book])->with('message', 'That book is already in your ' . $message . ' reading list.');
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
     * Show the form for editing the specified resource.
     */
    public function edit(UserBook $userBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserBook $userBook)
    {
        //
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
