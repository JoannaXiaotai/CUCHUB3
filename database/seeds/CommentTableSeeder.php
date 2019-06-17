<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\User;
use App\Post;
class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_ids=User::all()->pluck('id')->toArray();
        $post_ids=Post::all()->pluck('id')->toArray();
        $faker = app(Faker\Generator::class);
        $comments=factory(Comment::class)
                        ->times(1000)
                        ->make()
                        ->each(function ($comment,$index)
                            use ($user_ids,$post_ids,$faker)
                        {
                            $comment->user_id=$faker->randomElement($user_ids);
                            $comment->post_id=$faker->randomElement($post_ids);
                        });
//        factory(App\Comment::class, 50)->create(); //向users表中插入50条模拟数据
            Comment::insert($comments->toArray());
    }
}
