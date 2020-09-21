<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\LikeDislike;    

use Illuminate\Http\Request;

class LikeDislikeController extends Controller
{

    public function updateLike()
    {
        $id = request()->input('id');
        LikeDislike::findOrFail($id)->increment('likes');
    }
    public function updateDislike()
    {
        $id = request()->input('id');
        LikeDislike::findOrFail($id)->increment('dislikes');
    }


}
