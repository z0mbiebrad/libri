<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserBook extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeIndex($query, $list)
    {
        $query->where([
            'list' => $list,
            'user_id' => Auth::id()
        ]);
    }

    public function scopeList($query, $book, $list)
    {
        $query->where([
            'google_book_id' => $book->google_book_id,
            'list' => $list,
            'user_id' => Auth::id(),
        ]);
    }

    public function getRouteKeyName()
    {
        return 'google_book_id';
    }
    public function uniqueIds()
    {
        return ['google_book_id'];
    }
}
