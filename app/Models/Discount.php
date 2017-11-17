<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Discount extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'event_id',
    	'discount',
    	'start_date',
    	'end_date',
    ];

    public function books()
    {
    	return $this->hasMany(Book::class);
    }

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }
}
