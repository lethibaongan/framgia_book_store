<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Publisher extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function scopeListPublishers($query)
    {
        return $query->get();
    }
}
