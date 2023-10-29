<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserBook extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function scopeIndex($query, $list)
    {
        $query->where([
            'list' => $list,
            'user_id' => Auth::id()
        ]);
    }

    public function scopeStore($query, $book, $list)
    {
        $query->where([
            'google_book_id' => $book->google_book_id,
            'list' => $list,
            'user_id' => Auth::id(),
        ]);
    }

    public function getRouteKeyName()
    {
        return 'ulid';
    }
    public function uniqueIds()
    {
        return ['ulid'];
    }
}
