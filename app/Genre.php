<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Genre extends Model
{
    public $timestamps = false;

    public function movies(){
        
        return $this->hasMany(Movie::class);
    }

}
