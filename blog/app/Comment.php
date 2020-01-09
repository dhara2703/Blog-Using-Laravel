<?php

namespace App;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Based on the current comment we can find the user and it's name
    // $comment->user->name
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
