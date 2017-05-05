<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_title', 'post_content', 'post_type', 'post_status_id', 'comment_status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post_status()
    {
        return $this->belongsTo(PostStatus::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
