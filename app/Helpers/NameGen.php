<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 9/20/2016
 * Time: 7:34 PM
 */

namespace App\Helpers;


class NameGen
{
    public static function getName()
    {
        $first_syllables = array('ah', 'ad', 'ak', 'al', 'ba', 'bra', 'bri', 'kay', 'kah', 'rr', 'shi', 'fay', 'mon', 'ler', 'ron');
        $last_syllables = array('black', 'forest', 'red', 'sea', 'stan', 'stone', 'brick', 'sky', 'moon', 'shadow', 'beam');
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

    public function __toString()
    {
        return self::getName();
    }


=======
<?php
/**
 * Created by PhpStorm.
 * User: Genesis
 * Date: 9/20/2016
 * Time: 7:34 PM
 */

namespace App\Helpers;


class NameGen
{
    public static function getName()
    {
        $first_syllables = array('ah', 'ad', 'ak', 'al', 'ba', 'bra', 'bri', 'kay', 'kah', 'rr', 'shi', 'fay', 'mon', 'ler', 'ron');
        $last_syllables = array('black', 'forest', 'red', 'sea', 'stan', 'stone', 'brick', 'sky', 'moon', 'shadow', 'beam');
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

    public function __toString()
    {
        return self::getName();
    }


>>>>>>> 722419794345f866fdbd874ca81e10e9225f8e00
}