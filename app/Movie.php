<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Comment;


class Movie extends Model
{
    public function genre(){
        
        return $this->belongsTo(Genre::class);
    }

    public function comments(){
        
        return $this->hasMany(Comment::class);
    }

}
