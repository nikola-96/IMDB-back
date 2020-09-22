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

    public static function getComments($movie_id)
    {
        return self::with('user')->where('movie_id', $movie_id)->get();
    }
}
