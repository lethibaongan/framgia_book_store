<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'name',
        'image_path',
        'description',
        'link',
        'status'
    ];

    public function scopeListSlides($query)
    {
        return $query->where('status', config('index.status.slide_active'));
    }
}
