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
        $books = UserBook::index($list)->get();
        return view('book-lists.list', ['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($list, Book $book)
    {
        if (UserBook::store($book, $list)->exists()) {
            return redirect()->route('results.show', ['book' => $book])->with('status', 'This book is already in your ' . $list . ' reading list.');
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

        return redirect()->route('results.show', ['book' => $book])->with('status', 'Book added to ' . $list . ' reading list.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserBook $book)
    {
        $book->user_id === Auth::id()
            ? $view = view('book-lists.book', ['book' => $book])
            : $view = redirect(route('booksearch'));
        return $view;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserBook $book)
    {
        $list = $book->list;

        $book->list === 'current' ? $newList = 'finished' : $newList = 'current';

        if ($book::where([
            'google_book_id' => $book->google_book_id,
            'list' => $newList,
            'user_id' => Auth::id(),
        ])->exists()) {
            return redirect()->route('book.show', ['book' => $book])->with('status', 'This book is already in your ' . $newList . ' reading list.');
        };

        $book->list = $newList;
        $book->save();

        return redirect()->route('list.index', $list)->with('status', 'Book has been transferred to ' . $newList . ' successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserBook $book)
    {
        $list = $book->list;
        $book->delete();

        return redirect()->route('list.index', $list)
            ->with('status', 'Book deleted from ' . $list . ' list successfully.');
    }
}
