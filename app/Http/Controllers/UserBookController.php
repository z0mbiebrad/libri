<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBook;
use Illuminate\Support\Facades\Auth;

class UserBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($list)
    {
        $books = UserBook::where('list', $list)->where('user_id', Auth::id())->get();
        return view('book-lists.list', ['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($list, Book $book)
    {
        $message = $list;
        if (UserBook::where([
            'google_book_id' => $book->google_book_id,
            'list' => $list,
            'user_id' => Auth::id(),
        ])->exists()) {
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
        if ($book->user_id === Auth::id()) {
            return view('book-lists.book', ['book' => $book]);
        }
        return redirect(route('booksearch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserBook $book)
    {

        if ($book->list === 'current') {
            $listCheck = 'finished';
            $list = 'current';
        } else {
            $listCheck = 'current';
            $list = 'wishlist';
        }
        if ($book::where([
            'google_book_id' => $book->google_book_id,
            'list' => $listCheck,
            'user_id' => Auth::id(),
        ])->exists()) {
            ('a');
            return redirect()->route('book.show', ['book' => $book])->with('message', 'This book is already in your ' . $listCheck . ' reading list.');
        };
        $book->list = $listCheck;
        $book->save();
        return redirect()->route('list.index', $list)->with('message', 'Book has been transferred to ' . $listCheck . ' successfully.');
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
