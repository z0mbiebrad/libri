<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Http;


class BookSearch extends Controller
{
    public function index()
    {
        return view('booksearch');
    }

    public function show(Request $request)
    {
        $book = $request->input('bookSearch');

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes?q=' . $book . '&maxResults=40');
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        $books = $bookData->items;

        return view('booksearch', ['books' => $books]);
    }
}
