<?php

namespace App\Policies;

use App\User;
use App\Character;
use Illuminate\Auth\Access\HandlesAuthorization;

class CharacterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given character.
     *
     * @param User $user
     * @param Character $character
     * @return bool
     */
    public function destroy(User $user, Character $character)
    {
//        var_dump($user->id);
//        echo '<br>';
//        var_dump($character->user_id);
//        echo '<br>';
//        var_dump($user->id === (int)$character->user_id);
//        exit();
        return $user->id === (int)$character->user_id;
    }

    /**
     * Determine if the given user can edit the given character.
     *
     * @param User $user
     * @param Character $character
     * @return bool
     */
    public function edit(User $user, Character $character)
    {
//        var_dump($user->id);
//        echo '<br>';
//        var_dump($character->user_id);
//        echo '<br>';
//        var_dump($user->id === (int)$character->user_id);
//        exit();
        return $user->id === (int)$character->user_id;
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
