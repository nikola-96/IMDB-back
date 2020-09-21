<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    protected $guarded=['id'];

    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
}
