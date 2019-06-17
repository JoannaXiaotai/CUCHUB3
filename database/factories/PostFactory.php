<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
//    $sentence = $faker->sentence();
//
//    // 随机取一个月以内的时间
//    $updated_at = $faker->dateTimeThisMonth();
//
//    // 传参为生成最大时间不超过，因为创建时间需永远比更改时间要早
//    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        //
        'user_id' =>1,
        'title' => $faker->name,
        'content' => $faker->text,

    ];
});
