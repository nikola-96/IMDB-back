<?php

use Faker\Generator as Faker;

$factory->define(App\LikeDislike::class, function (Faker $faker) {
    return [
        'like' => 50,
        'dislike' => 20 
    ];
});