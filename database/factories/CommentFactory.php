<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    // 随机取一个月以内的时间
    $time = $faker->dateTimeThisMonth();
    return [
        //
        'content' => $faker->text,
//        'post_id' => 1,
//        'user_id' => 1,
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
