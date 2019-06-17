<?php

use Illuminate\Database\Seeder;

class ReleasedBookPicTableSeeder extends Seeder
{
    public function run()
    {
        //
        factory(App\ReleasedBookPic::class, 60)->create(); //向users表中插入50条模拟数据
    }
}
