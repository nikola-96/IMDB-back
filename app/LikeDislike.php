<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class LikeDislike extends Model
{
    protected $fillable =['user_id', 'movie_id', 'liked', 'disliked'];

    public function movies(){
        
        return $this->hasMany(Movie::class);
    }

}
