<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('wish_list')) {
            //存在则删除
            Schema::drop('wish_list');
        }
        Schema::create('wish_list', function (Blueprint $table) {
            $table->bigIncrements('wish_id');
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->foreign("book_id")->references('book_id')->on('books');
            $table->foreign("user_id")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wish_list');
    }
}
