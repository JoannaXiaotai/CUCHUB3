<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'content' => $faker->text,
        'post_id' => 1,
        'user_id' => 1,
    ];
});
