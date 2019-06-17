<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(App\ReleasedBookPic::class, function (Faker $faker) {
    $relesed_books_count = DB::table('released_books')->count();
    $released_book_id= $faker->numberBetween(1, $relesed_books_count);
    return [
        'released_book_id'=> $released_book_id,
        "pic_addr"=>$faker->randomElement(['https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/4049.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg',
            'https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/4050.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg',
            'https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/4029.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg',
            'https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/4023.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg',
            'https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/4035.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg',
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/4030.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/4038.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2044.jpg?imageView2/2/q/80/w/720/h/720/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2073.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2092.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2072.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2618.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2614.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2611.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2619.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2540.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2546.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2545.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2547.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2542.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2541.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2221.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2214.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2213.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2216.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2226.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2137.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2199.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2139.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg",
            "https://qnmob3.doubanio.com/view/freyr_page_photo/raw/public/2201.jpg?imageView2/2/q/80/w/1440/h/1440/format/jpg"
        ])
    ];
});