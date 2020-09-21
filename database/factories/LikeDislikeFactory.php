<?php

use Faker\Generator as Faker;

$factory->define(App\LikeDislike::class, function (Faker $faker) {
    return [
        'likes' => 50,
        'dislikes' => 20 
    ];
});
