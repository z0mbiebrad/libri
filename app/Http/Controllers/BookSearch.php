<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Http;


class BookSearch extends Controller
{
    public function index(Request $request)
    {
        return view('booksearch');
    }
    public function show(Request $request)
    {
        $key = config('services.google_api');

        $book = $request->input('bookSearch');

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes?q=' . $book . '&key=' . $key);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $books = $bookData->items;


        return view('results', ['books' => $books]);
    }

    public function book(Request $request, $id)
    {
        $key = config('services.google_api');

        $book = $id;

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes/' . $book . '?key=' . $key);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $book = $bookData;

        return view('book', ['book' => $book]);
    }
}
