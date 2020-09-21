<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class LikeDislike extends Model
{
    protected $guarded=['id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
