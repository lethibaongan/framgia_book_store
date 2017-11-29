<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class CateOfBook extends Model
{
    protected $table = 'cates_of_books';
    
    protected $fillable = [
    	'book_id',
    	'cate_id',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
