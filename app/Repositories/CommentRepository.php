<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 10/1/2016
 * Time: 12:02 AM
 */

namespace App\Repositories;

use App\User;
use App\Comment;


class CommentRepository
{
    /**
     * Get all posts for a given user.
     *
     * @param User $user
     * $return Collection
     */
    public function forUser(User $user)
    {
        return Comment::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
=======
<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 10/1/2016
 * Time: 12:02 AM
 */

namespace App\Repositories;

use App\User;
use App\Comment;


class CommentRepository
{
    /**
     * Get all posts for a given user.
     *
     * @param User $user
     * $return Collection
     */
    public function forUser(User $user)
    {
        return Comment::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
>>>>>>> 722419794345f866fdbd874ca81e10e9225f8e00
}