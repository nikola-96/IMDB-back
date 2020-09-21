<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\LikeDislike;
use App\User;
use App\Movie;    

use Illuminate\Http\Request;

class LikeDislikeController extends Controller
{

    public function updateLike(Request $request)
    {
        $like_id = $request->input('like_id');
        $movie_id = $request->input('movie_id');
        $like = LikeDislike::findOrFail($like_id)->increment('likes');
        $movie = Movie::findOrFail($movie_id);
        $user = User::findOrFail(1);
        $movie->users()->attach($user);


    }
    public function updateDislike()
    {
        $id = request()->input('id');
        LikeDislike::findOrFail($id)->increment('dislikes');
    }


}
