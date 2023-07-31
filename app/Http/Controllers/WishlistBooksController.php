<?php

namespace App\Http\Controllers;

use App\Models\WishlistBooks;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Http;

class WishlistBooksController extends Controller
{
    public function show()
    {
        $books = Wishlistbooks::all();

        return view('wishlist', ['books' => $books]);
    }

    public function bookshow(Request $request, $id)
    {
        $book = WishlistBooks::find($id);

        return view('wishlist-book', ['book' => $book]);
    }

    public function store(Request $request, $id)
    {
        $book = $id;

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes/' . $book);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $book = $bookData;

        try {
            WishlistBooks::create([
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

        return view('book', ['book' => $book]);
    }
}
