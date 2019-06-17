<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasedBookWishListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('released_book_wish_list')) {
            //存在则删除
            Schema::drop('released_book_wish_list');
        }
        Schema::create('released_book_wish_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('released_book_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->foreign("released_book_id")->references('released_book_id')->on('released_books');
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
        Schema::dropIfExists('released_book_wish_list');
    }
}
