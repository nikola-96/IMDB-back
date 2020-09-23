<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class LikeDislike extends Model
{
    public function movies(){
        
        return $this->hasMany(Movie::class);
    }

}
