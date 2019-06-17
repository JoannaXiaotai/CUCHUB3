<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class); // 这里有先后关系需要注意一下： 评论n : 1文章/用户，所以应该把它写在最后
        $this->call(BookTabelSeeder::class);
        $this->call(ReleasedBookTableSeeder::class);
        $this->call(ReleasedBookPicTableSeeder::class);

    }
}
