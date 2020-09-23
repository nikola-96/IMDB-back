<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Genre;
use App\Comment;
use App\Visit;
use App\LikeDislike;

class Movie extends Model
{
    public function genre(){
        
        return $this->belongsTo(Genre::class);
    }
    public function visits()
    {
        return $this->hasOne(Visit::class);

    }
    public function comments(){
        
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        
        return $this->hasMany(LikeDislike::class);
    }


}
