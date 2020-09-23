<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Visit;
use App\Comment;
class Movie extends Model
{
    public function visits()
    {
        return $this->hasOne(Visit::class);
    }

    public function comments(){
        
        return $this->hasMany(Comment::class);
    }

}
