<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
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

    protected $dates = ['deleted_at'];

    public function cateOfBooks()
    {
    	return $this->hasMany(CateOfBook::class);
    }

    public function orderBooks()
    {
    	return $this->hasMany(OrderBook::class);
    }

    public function reviews()
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

    public function scopeListnewbook($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function getImagePathAttribute()
    {
        return config('index.link.image_home_folder').$this->image;
    }
}
