<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Genre;
use App\Comment;
use App\Visit;
use App\MovieList;
use App\LikeDislike;
use App\User;

class Movie extends Model
{
    protected $guarded = ['id'];
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
    public function lists(){
        
        return $this->hasMany(MovieList::class);
    }
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select movie_id, count(liked) likes, count(disliked) dislikes from like_dislikes group by movie_id',
            'like_dislikes',
            'like_dislikes.movie_id',
            'movies.id'
        );
    }
}
