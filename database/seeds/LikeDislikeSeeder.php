<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\LikeDislike;


class LikeDislikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::all()->each(function (Movie $movie){
            $movie->likeDislike()->save(factory(LikeDislike::class)->make());
        });

    }
}
