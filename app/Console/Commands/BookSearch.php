<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class BookSearch extends Command
{
    protected $signature = 'fetch:books';

    protected $description = 'Uses google books api to search for the users books';

    public function handle(Request $request)
    {
        $book = $request->input('bookSearch');

        $bookResponse = HTTP::get('https://www.googleapis.com/books/v1/volumes?q=' . $book);
        $bookResults = $bookResponse->body();
        $bookData = json_decode($bookResults);
        dd($bookData);
    }
}
