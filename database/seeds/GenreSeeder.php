<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['action', 'adventure', 'comedy', 'crime','drama','fantasy','historical','horror','romance','science fiction','thriller'];

        foreach ($genres as $genre) {
        DB::table('genres')->insert([
            'name' => $genre,
        ]);
 }
}
}
