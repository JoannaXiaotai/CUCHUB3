<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id','title','content','category_id','reply_count'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    // 绑定1:n关系
    public function comments() {
        return $this->hasMany('App\Comment'); // 1 hasMany n
    }

    // 根据 user_id 获取用户名
    public function userName() {
        return User::find($this->user_id)->name; //这里通过当前对象的 user_id 获取 user对象， 然后指向->name属性
    }
}
