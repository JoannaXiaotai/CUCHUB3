<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';
    protected $primaryKey = "book_id";
    protected $fillable = [
        'book_id', 'book_ibsn10',  'book_ibsn13','book_name','book_publisher','book_version','book_publish_year','book_market_price','book_author_name','book_pic_small','book_pic_large','book_summary'
    ];
    public function releasedBooks(){
        return $this->hasMany('App\ReleasedBook',"book_id","book_id"); // 1 hasMany n
    }
    public function collecters(){
        return $this->belongsToMany('App\User','wish_list',"book_id","user_id");;
    }
    public function getRecommendBook(){
        return $this->orderBy("book_id","asc")->take(4)->get();
    }
    public function getIndexBooks(){
        return $this->simplePaginate(5);
    }
}
