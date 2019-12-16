<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'body' => $faker->sentence(),
        'user_id'=>App\User::inRandomOrder()->first()->id,
        
    ];
});
