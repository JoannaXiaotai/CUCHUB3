<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','introduction','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    public function releasedBooks() {
        return $this->hasMany('App\ReleasedBook',"releaser_id","id"); // 1 hasMany n
    }
    public function collectedBooks() {
        return $this->belongsToMany('App\Book',"wish_list","user_id","book_id");
    }
    public function collectedReleasedBooks(){
        return $this->belongsToMany('App\ReleasedBook',"released_book_wish_list","user_id","released_book_id");
    }
}
