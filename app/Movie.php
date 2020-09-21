<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = ['id'];

    public function likeDislike()
    {
        return $this->hasOne('App\LikeDislike');
    }
}
