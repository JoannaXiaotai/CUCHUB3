<?php

namespace App\Observers;
use App\Notifications\PostCommented;
use App\Comment;
use App\User;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class CommentObserver
{
    public function created(Comment $comment)
    {
//        $comment->post->increment('comment_count', 1);
        $post=$comment->post;
//        $post->comment_count = $comment->post->comments->count();
        $post->increment('comment_count', 1);
        $post->save();

        // 通知话题作者有新的评论
        $post->user->notify(new PostCommented($comment));
    }
    public function creating(Comment $comment)
    {
        $comment->content = clean($comment->content, 'user_post_body');
    }
    public function deleted(Comment $comment)
    {
        $comment->post->comment_count = $comment->post->comments->count();
        $comment->post->save();
    }

}