<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 9/20/2016
 * Time: 11:38 AM
 */

namespace App\Repositories;

use App\User;
use App\Character;

class CharacterRepository
{
    /**
     * Get all characters for a given user.
     *
     * @param User $user
     * $return Collection
     */
    public function forUser(User $user)
    {
        return Character::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}