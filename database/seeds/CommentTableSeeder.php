<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Movie::all()->each(function(App\Movie $movie) {	
            $movie->comments()->saveMany(factory(App\Comment::class, 15)->make());
        });
    }
}
