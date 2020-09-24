<?php

use Faker\Generator as Faker;
use App\User;
use App\Movie;
use App\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    $userIds = User::all()->pluck('id')->toArray();
    $movieIds = Movie::all()->pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($userIds),
        'movie_id' => $faker->randomElement($movieIds),
        'content' => $faker->realText(200, 1),

    ];
});
