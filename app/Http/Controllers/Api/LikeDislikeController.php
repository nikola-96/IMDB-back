<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LikeDislike;
use App\Events\Likes;

class LikeDislikeController extends Controller
{
    public function createLike($id)
    {   
       $like = LikeDislike::create([
            'user_id' => auth()->id(),
            "movie_id" => $id,
            'liked' => true
        ]);
        broadcast(new Likes($like));

    }
    public function createDislike($id)
    {
        LikeDislike::create([
            'user_id' => auth()->id(),
            "movie_id" => $id,
            'disliked' => true
        ]);
    }
}
