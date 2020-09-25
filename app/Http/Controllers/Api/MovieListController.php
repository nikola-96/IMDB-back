<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MovieList;
use App\Movie;

class MovieListController extends Controller
{
    public function addToList(Request $request)
    {
        return MovieList::create([
            'movie_id' => $request->id,
            'user_id' => auth()->id(),
            'watched' => true
        ]);
    }
    public function getMoviesFromList()
    {
        $movies_ids = MovieList::where('user_id', auth()->id())->pluck('movie_id');

        return Movie::whereIn('id', $movies_ids)->with('lists')->paginate(10);
    }
    public function destroy(Request $request)
    {
        $list = MovieList::where(['user_id' => auth()->id(), 'movie_id' => $request->id]);
        $list->delete();

        return 'true';
    }
}
