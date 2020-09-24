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
        MovieList::create([
            'movie_id' => $request->id,
            'user_id' => auth()->id(),
            'watched' => true
        ]);
    }
    public function getMoviesFromList()
    {
        $movies_ids = MovieList::where('user_id', auth()->id())->value('id');
        dd($movies_ids);
        return Movie::whereIn('id', $movies_ids)->with('lists')->paginate(10);
    }
    public function destroy(Request $request)
    {
        $list = MovieList::where(['user_id' => auth()->id(), 'movie_id' => $request->id]);
        // $list = MovieList::findOrFail($request->id);
        $list->delete();

        return 'true';
    }
}
