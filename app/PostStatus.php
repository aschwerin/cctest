<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
