<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 9/20/2016
 * Time: 11:38 AM
 */

namespace App\Repositories;

use App\User;
use App\Monster;

class MonsterRepository
{
    /**
     * Get all characters for a given user.
     *
     * @param User $user
     * $return Collection
     */
    public function forUser(User $user)
    {
        return Monster::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
=======
<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 9/20/2016
 * Time: 11:38 AM
 */

namespace App\Repositories;

use App\User;
use App\Monster;

class MonsterRepository
{
    /**
     * Get all characters for a given user.
     *
     * @param User $user
     * $return Collection
     */
    public function forUser(User $user)
    {
        return Monster::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
>>>>>>> 722419794345f866fdbd874ca81e10e9225f8e00
}