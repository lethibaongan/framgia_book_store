<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function cateOfBooks(){
        return $this->hasMany(CateOfBook::class);
    }

    public function scopeListCategories($query)
    {
        return $query->get();
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'cates_of_books', 'cate_id', 'book_id');
    }
}
