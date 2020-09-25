<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Genre;
use App\Visit;
use App\Comment;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = request()->input('term');
        $genre = request()->input('genre');
        


        if($term && $genre){

             return Movie::where('title', 'LIKE', '%' . $term . '%')
                    ->where('genre_id', $genre)->with(['genre','lists'=> function ($query) {
                        $query->where('user_id', '=', auth()->id());
                    }])->withLikes()
                    ->paginate(10)->appends(request()->query());

        } else if ($term) {

            return Movie::where('title', 'LIKE', '%' . $term . '%')
            ->with(['genre','lists'=> function ($query) {
                $query->where('user_id', '=', auth()->id());
            }])->withLikes()
                    ->paginate(10)->appends(request()->query());
        } else if($genre) {

            return Movie::where('genre_id', $genre)->with(['lists'=> function ($query) {
                $query->where('user_id', '=', auth()->id());
            }])->withLikes()->paginate(10);
        }else{
            return Movie::with(['genre', 'lists'=> function ($query) {
                $query->where('user_id', '=', auth()->id());
            }])->withLikes()->paginate(10);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @ \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {   
        
        Visit::findOrFail($id)->increment('visits');
        
        return Movie::with(['visits', 'lists'=> function ($query) {
            $query->where('user_id', '=', auth()->id());
        }])->withLikes()->findOrFail($id);;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getRelatedMovies()
    {
         return Movie::where('genre_id',request()->input('genre'))->take(10)->get();
    }

    public function getMostRated()
    {
       return Movie::withLikes()->orderBy('likes', 'desc')->take(10)->get();
    }

}
