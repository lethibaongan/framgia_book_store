<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Book extends Model
{
    //
    use SoftDeletes;

    protected $fillable[
    	'name',
    	'author_id',
    	'publisher_id',
    	'image',
    	'description',
    	'price',
    	'publish_year',
    	'discount_id',
    	'quantity',
    	'avg_rate',
    	'total_people_rate',
    ];

    public function cateOfBook()
    {
    	return $this->hasMany(CateOfBook::class);
    }

    public function orderBook()
    {
    	return $this->hasMany(OrderBook::class);
    }

    public function review()
    {
    	return $this->hasMany(Review::class);
    }

    public function author()
    {
    	return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
    	return $this->belongsTo(Publisher::class);
    }

    public function discount()
    {
    	return $this->belongsTo(Discount::class);
    }
}
