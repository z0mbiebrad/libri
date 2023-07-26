<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BookSearch extends Controller
{
    public function index()
    {
        return view('booksearch');
    }

    public function show()
    {
        Artisan::call('fetch:books');

        return view('booksearch');
    }
}
