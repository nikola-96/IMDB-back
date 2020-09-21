<?php

use Illuminate\Database\Seeder;
use App\Visit;
use App\Movie;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::all()->each(function (Movie $movie){
            $movie->visits()->save(factory(Visit::class)->make());
        });
    }
}
