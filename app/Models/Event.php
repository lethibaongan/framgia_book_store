<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class Event extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
    	'name',
    	'description',
    	'start_date',
    	'end_date',
    ];

    public function discount()
    {
    	return $this->hasMany(Models::class);
    }
}
