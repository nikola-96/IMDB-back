<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Genre;
use App\Comment;
use App\Visit;
use App\MovieList;

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

    public function lists(){
        
        return $this->hasMany(MovieList::class);
    }
    public function scopeWithLists(Builder $query)
    {
        $query->leftJoinSub(
            
            'SELECT movie_id, user_id FROM movie_lists GROUP BY movie_id',
            'movie_lists',
            'movie_lists.movie_id',
            'movies.id'
        );
    }
}
