<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Movie;
use App\Genre;
use App\Visit;
use App\Comment;
use App\Services\ImageCreationService;
use App\Events\MovieCreationEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\MovieCreationMail;
use App\Jobs\SendEmailJob;

class MovieController extends Controller
{
    private $imageCreationService;

    public function __construct(ImageCreationService $imageCreationService)
    {
       $this->imageCreationService = $imageCreationService;
    }

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
    public function store(MovieRequest $request)
    {
        if($request->get('image'))
        {
           $image = $request->get('image');
           $image_id = $this->imageCreationService->storeImage($image);
           $movie = Movie::create(array_merge($request->except('image'), ['movie_images_id' => $image_id]));
        }
        $movie = Movie::create(array_merge($request->all()));
         Visit::create(['movie_id'=> $movie->id, 'visits'=> 0]);
 
        return response()->json(['success' => 'You have successfully uploaded an image'], 200);

         SendEmailJob::dispatch($movie);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {   
        
        Visit::where('movie_id',$id)->first()->increment('visits');
        
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
