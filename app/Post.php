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

    public function scopeWithOrder($query)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch ('creattime') {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentCommented();
                break;
        }
        // 预加载防止 N+1 问题
        return $query->with('user', 'category');
    }

    public function scopeRecentCommented($query)
    {
        // 当话题有新回复时，我们将编写逻辑来更新话题模型的 reply_count 属性，
        // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
        return $query->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy('created_at', 'desc');
    }
}
