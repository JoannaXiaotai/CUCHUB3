<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('books')) {
            //存在则删除
            Schema::drop('books');
        }

        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->bigInteger('book_ibsn10')->unique();
            $table->bigInteger('book_ibsn13')->unique();
            $table->string('book_name');
            $table->string('book_publisher');
            $table->string('book_version');
            $table->string('book_publish_year');
            $table->string('book_market_price');
            $table->string('book_author_name');
            $table->string('book_pic_small');
            $table->string('book_pic_large');
            $table->mediumText("book_summary");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
