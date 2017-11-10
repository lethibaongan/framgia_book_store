<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Category extends Model
{
    //
    protected $fillable = [
    	'name',
    	'description',
    ];

    public function cateOfBook(){
    	return $this->hasMany(CateOfBook::class);
    }
}
