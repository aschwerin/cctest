<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Monster;
use App\Repositories\MonsterRepository;

class MonsterGenController extends Controller
{
    /**
     * Creates a random monster.
     * (Name, Class, Race, Base Stats)
     *
     * @return array
     */
    public function getMonster()
    {
        $character = array(
            'name' => $this->getName(),
            'class' => $this->getMonsterClass(),
            'race' => $this->getMonsterRace(),
            'str' => $this->rolld20(),
            'dex' => $this->rolld20(),
            'con' => $this->rolld20(),
            'int' => $this->rolld20(),
            'wis' => $this->rolld20(),
            'cha' => $this->rolld20()
        );
        return $character;
    }

    /**
     * Re-rolls base stats.
     *
     * @return array
     */
    public function getStats()
    {
        $stats = array(
            'str' => $this->rolld20(),
            'dex' => $this->rolld20(),
            'con' => $this->rolld20(),
            'int' => $this->rolld20(),
            'wis' => $this->rolld20(),
            'cha' => $this->rolld20()
        );
        return $stats;
    }


    /**
     * Roll 1d20
     *
     * @return int
     */
    public function rolld20()
    {
        return mt_rand(1, 20);
    }

    /**
     * Roll 1d4
     *
     * @return int
     */
    public function rolld4()
    {
        return mt_rand(1, 4);
    }

    /**
     * Roll 1d6
     *
     * @return int
     */
    public function rolld6()
    {
        return mt_rand(1, 6);
    }

    /**
     * Roll 1d8
     *
     * @return int
     */
    public function rolld8()
    {
        return mt_rand(1, 8);
    }

    /**
     * Roll 1d20
     *
     * @return int
     */
    public function rolld10()
    {
        return mt_rand(1, 10);
    }

    /**
     * Roll 1d20
     *
     * @return int
     */
    public function rolld12()
    {
        return mt_rand(1, 12);
    }

    /**
     * Creates a random first and last monster name.
     *
     * @return string
     */
    public function getMonsterName()
    {
        $first_syllables = array('ah', 'ad', 'ak', 'al',
            'ba', 'bra', 'bri',
            'don', 'dee', 'ed', 'em', 'en', 'ee', 'eff', 'ell', 'g',
            'kay', 'kah', 'oh', 'ess',
            'rr', 'shi', 'fay', 'mon', 'ler', 'ron', 'th', 'wil', 'exe', 'yr', 'eze', 'una', 'uno');
        $last_syllables = array('black', 'forest', 'red', 'sea', 'stan', 'stone', 'brick', 'sky', 'moon', 'shadow',
            'beam', 'sun', 'green', 'blue', 'earth', 'wood');
        unset($num_syllables);
        $num_syllables = mt_rand(2, 4);
        $first_name = '';
        for ($i = 0; $i < $num_syllables; $i++) {
            $first_name .= $first_syllables[mt_rand(0, sizeof($first_syllables) - 1)];
        }
        unset($num_syllables2);
        $num_syllables2 = mt_rand(1, 2);
        $last_name = '';
        for ($i = 0; $i < $num_syllables2; $i++) {
            $last_name .= $last_syllables[mt_rand(0, sizeof($last_syllables) - 1)];
        }
        return ucfirst($first_name) . " " . ucfirst($last_name);

    }

    /**
     * Creates a random monster class.
     *
     * @return string
     */
    public function getMonsterClass()
    {
        $charClasses = array( 'Barbarian','Bard','Cleric','Druid','Fighter','Monk','Paladin','Ranger','Rogue',
            'Sorcerer','Warlock','Wizard' );
        $charClass = $charClasses[mt_rand( 0, sizeof($charClasses)-1 )];
        return $charClass;
    }

    /**
     * Creates a random character race.
     *
     * @return string
     */
    public function getMonsterRace()
    {
        $races = array( 'Dragonborn','Drow','Dwarf','Elf','Gnome','Half-Elf','Half-Orc','Halfling','Human','Tiefling', 'Orc', 'Troll', 'Ogre', 'Imp', 'Demon', 'Dragon' );
        $race = $races[mt_rand( 0, sizeof($races)-1 )];
        return $race;
    }
}
