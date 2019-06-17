<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReleasedBook extends Model
{
    //
    protected $table = 'released_books';
    protected $primaryKey = "released_book_id";
    protected $fillable = [
        'released_book_id', 'book_id',  'releaser_id','book_name','price','description'
    ];
    public function belongBook() {
        return $this->belongsTo('App\Book',"book_id","book_id"); // n belongsTo 1
    }
    public function releaser() {
        return $this->belongsTo('App\User',"releaser_id","id"); // n belongsTo 1
    }
    public function releasedBookPics() {
        return $this->hasMany('App\ReleasedBookPic'); // 1 hasMany n
    }
    public function collecters(){
        return $this->belongsToMany('App\User','released_book_wish_list',"released_book_id","user_id");;
    }
    public function getIndexReleasedBooks()
    {
        return $this->simplePaginate(5);
    }
}