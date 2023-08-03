<?php

namespace App\Http\Controllers;

use App\Models\FinishedBook;
use \Illuminate\Support\Facades\Http;

class FinishedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = FinishedBook::all();

        return view('current', ['books' => $books]);
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
    public function store(string $id)
    {
        $book = $id;

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes/' . $book);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $book = $bookData;

        try {
            FinishedBook::create([
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = FinishedBook::find($id);

        return view('current-book', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FinishedBook::where('id', $id)->delete();

        return redirect()->route('finished.index')
            ->with('message', 'Book deleted successfully.');
    }
}
