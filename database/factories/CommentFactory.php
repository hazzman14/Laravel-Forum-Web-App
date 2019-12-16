<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentence(),
        'user_id'=>App\User::inRandomOrder()->first()->id,
        'post_id'=>App\User::inRandomOrder()->first()->id,
    ];
});
