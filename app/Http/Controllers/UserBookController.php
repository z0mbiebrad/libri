<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (Auth::user()) {
            if ($request->is('finished')) {
                $books = UserBook::where('list', 'finished')->get();
                return view('finished', ['books' => $books]);
            }
            if ($request->is('current')) {
                $books = UserBook::where('list', 'current')->get();
                return view('current', ['books' => $books]);
            }
            if ($request->is('wishlist')) {
                $books = UserBook::where('list', 'wishlist')->get();
                return view('wishlist', ['books' => $books]);
            }
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserBook $userBook)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserBook $userBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserBook $userBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserBook $userBook)
    {
        //
    }
}
