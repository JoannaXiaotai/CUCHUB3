<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasedBookPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('released_book_pics')) {
            //存在则删除
            Schema::drop('released_book_pics');
        }
        Schema::create('released_book_pics', function (Blueprint $table) {
            $table->bigIncrements('released_book_pic_id');
            $table->bigInteger('released_book_id')->unsigned();
            $table->string('pic_addr');
            $table->timestamps();
            $table->foreign('released_book_id')->references('released_book_id')->on('released_books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('released_book_pics');
    }
}