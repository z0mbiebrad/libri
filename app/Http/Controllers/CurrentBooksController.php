<?php

namespace App\Http\Controllers;

use App\Models\CurrentBooks;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Http;


class CurrentBooksController extends Controller
{
    public function show()
    {
        $books = Currentbooks::all();

        return view('current', ['books' => $books]);
    }

    public function bookshow(Request $request, $id)
    {
        $book = CurrentBooks::find($id);

        return view('current-book', ['book' => $book]);
    }
    public function store(Request $request, $id)
    {
        $book = $id;

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes/' . $book);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $book = $bookData;

        try {
            CurrentBooks::create([
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
            //throw $th;
        }

        return view('book', ['book' => $book])->with('current', 'Book added to currently reading list.');
    }

    public function destroy(Request $request, $id)
    {
        CurrentBooks::where('id', $id)->delete();

        return redirect()->route('current')
            ->with('message', 'Book deleted successfully.');
    }
}
