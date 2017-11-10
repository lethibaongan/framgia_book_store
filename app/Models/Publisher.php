<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models

class Publisher extends Model
{
    //
    protected $fillable = [
    	'name',
    	'description',
    ];

    public function book()
    {
    	return $this->hasMany(Book::class);
    }
}
