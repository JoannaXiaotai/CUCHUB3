<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Category;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        factory(App\Post::class, 1000)->create(); //向users表中插入50条模拟数据
        // 所有用户 ID 数组，如：[1,2,3,4]
        $user_ids = User::all()->pluck('id')->toArray();

        // 所有分类 ID 数组，如：[1,2,3,4]
        $category_ids = Category::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $posts = factory(Post::class)
            ->times(100)
            ->make()
            ->each(function ($post, $index)
            use ($user_ids, $category_ids, $faker)
            {
                // 从用户 ID 数组中随机取出一个并赋值
                $post->user_id = $faker->randomElement($user_ids);

                // 话题分类，同上
                $post->category_id = $faker->randomElement($category_ids);
            });

        // 将数据集合转换为数组，并插入到数据库中
        Post::insert($posts->toArray());
    }
}
