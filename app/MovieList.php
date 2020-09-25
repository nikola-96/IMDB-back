<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;

class MovieList extends Model
{
    protected $guarded =['id'];
    
    public function movies(){
        
        return $this->hasMany(Movie::class);
    }
    public function users(){
        
        return $this->hasMany(User::class);
    }

}
