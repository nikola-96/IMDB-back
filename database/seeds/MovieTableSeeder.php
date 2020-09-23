<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Movie;

class MovieTableSeeder extends Seeder
{
    public function run()
    {
        App\Genre::all()->each(function(App\Genre $genre) {	
            $genre->movies()->saveMany(factory(App\Movie::class, 40)->make());
        });
        }
}
