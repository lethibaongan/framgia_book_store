<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Author extends Model
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'description',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
