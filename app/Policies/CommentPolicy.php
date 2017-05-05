<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class CommentPolicy
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
     * Determine if the given user can delete the given comment.
     *
     * @param User $user
     * @param Comment $comment
     * @return bool
     */
    public function destroy(User $user, Comment $comment)
    {
        return $user->id === (int)$comment->user_id;
    }

    /**
     * Determine if the given user can edit the given post.
     *
     * @param User $user
     * @param Comment $comment
     * @return bool
     */
    public function edit(User $user, Comment $comment)
    {
        return $user->id === (int)$comment->user_id;
    }
}
