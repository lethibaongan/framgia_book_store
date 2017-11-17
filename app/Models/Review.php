<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Review extends Model
{
    protected $fillale = [
    	'name',
    	'description',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
