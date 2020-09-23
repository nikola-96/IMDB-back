<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(MovieTableSeeder::class);
        $this->call(VisitSeeder::class);
        $this->call(LikeDislikeTableSeeder::class);
    }
}
