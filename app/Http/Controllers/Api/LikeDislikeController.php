<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LikeDislike;

class LikeDislikeController extends Controller
{
    public function createLike($id)
    {   
        LikeDislike::create([
            'user_id' => auth()->id(),
            "movie_id" => $id,
            'liked' => true
        ]);

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
