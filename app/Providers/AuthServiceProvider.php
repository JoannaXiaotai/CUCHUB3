<?php

namespace App\Providers;
use App\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        Comment::class=>CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
        Gate::define('update-post',function($user,$post){
            return $user->id==$post->user_id;
        });

        Gate::define('delete-comment',function($user,$comment){
            return $user->id==$comment->user_id;
        });
        //
    }
}
