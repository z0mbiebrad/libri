<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];


    public function getRouteKeyName()
    {
        return 'ulid';
    }
    public function uniqueIds()
    {
        return ['ulid'];
    }
}
