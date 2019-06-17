<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'content', 'user_id', 'post_id'
    ];

    public function post() {
        return $this->belongsTo('App\Post'); // n belongsTo 1
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    // 根据 user_id 获取用户名
    public function userName() {
        return User::find($this->user_id)->name; //这里通过当前对象的 user_id 获取 user对象， 然后指向->name属性
    }
}
