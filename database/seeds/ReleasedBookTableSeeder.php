<?php

use Illuminate\Database\Seeder;

class ReleasedBookTableSeeder extends Seeder
{
    public function run()
    {
        //
        factory(App\ReleasedBook::class, 20)->create(); //向users表中插入50条模拟数据
    }
}