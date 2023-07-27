<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Http;


class BookSearch extends Controller
{
    public function index(Request $request)
    {
        $book = $request->input('bookSearch');

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes?q=' . $book);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $books = $bookData->items ?? null;

        return view('booksearch', ['books' => $books] ?? null);
    }

    public function book(Request $request, $id)
    {
        $book = $id;

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes/' . $book);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $book = $bookData;

        return view('book', ['book' => $book]);
    }
}
