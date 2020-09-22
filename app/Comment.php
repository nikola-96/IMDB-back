<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\User;

class Comment extends Model
{
    protected $guarded=['id'];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function movie(){

        return $this->belongsTo(Movie::class);
    }

}
