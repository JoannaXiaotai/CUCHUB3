<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('released_books')) {
            //存在则删除
            Schema::drop('released_books');
        }
        Schema::create('released_books', function (Blueprint $table) {
            $table->bigIncrements('released_book_id');
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('releaser_id')->unsigned();
            $table->double('price');
            $table->mediumText('description');
            $table->timestamps();
            $table->foreign("book_id")->references('book_id')->on('books');
            $table->foreign("releaser_id")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('released_books');
    }
}
