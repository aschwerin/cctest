<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can delete the given post.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function destroy(User $user, Post $post)
    {
        return $user->id === (int)$post->user_id;
    }

    /**
     * Determine if the given user can edit the given post.
     *
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function edit(User $user, Post $post)
    {
        return $user->id === (int)$post->user_id;
    }
}
