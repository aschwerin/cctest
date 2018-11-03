<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 9/20/2016
 * Time: 11:38 AM
 */

namespace App\Repositories;

use App\User;
use App\Post;

class PostRepository
{
    /**
     * Get all posts for a given user.
     *
     * @param User $user
     * $return Collection
     */
    public function forUser(User $user)
    {
        return Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}