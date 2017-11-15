<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class OrderBook extends Model
{
    protected $fillable = [
    	'book_id',
    	'order_id',
    	'quantity',
    	'price',
    ];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
