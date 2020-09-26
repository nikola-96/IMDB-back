<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Visit extends Model
{
    protected $guarded = ['id'];
    
    public function movie()
    {
        return $this->hasOne(Movie::class);
    }
}
