<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\RealeasedBook;
use App\Book;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\ReleasedBook::class, function (Faker $faker) {
    try{
        $releaser_id=function () { return factory(User::class)->create()->id; };
    }
    catch(Illuminate\Database\QueryException $e)
    {
        $releaser_id=1;
    }
    $isbn = $faker->randomElement(["7505715666","7532738159","9787508653167","9787560633503","9787040406641","9787302089797","9787513331036"]);
    $users_count=DB::table('users')->count();
    $user_id=$faker->numberBetween(1, $users_count);
    print($user_id);
    $book_id=DB::table('books')->select('book_id')->where('book_ibsn10',$isbn)->orWhere('book_ibsn13', $isbn)->first()->book_id;
    return [
        'book_id'=> $book_id,
        'releaser_id' => $user_id,
        "price"=>rand(500, 1000),
        "description"=>$faker->text(490)
    ];
});