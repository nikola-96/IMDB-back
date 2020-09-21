<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Movie extends Model
{
    protected $guarded = ['id'];

    public function likeDislike()
    {
        return $this->hasOne('App\LikeDislike');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
