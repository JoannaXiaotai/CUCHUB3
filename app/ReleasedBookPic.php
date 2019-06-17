<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReleasedBookPic extends Model
{
    //
    protected $fillable = [
        'released_book_pic_id', 'released_book_id',  'pic_addr'
    ];
    public function belongReleasedBook() {
        return $this->belongsTo('App\ReleasedBook'); // n belongsTo 1
    }
}