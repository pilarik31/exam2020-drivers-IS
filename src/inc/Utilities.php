<?php
namespace PilaLib;

class Utilities
{
    /**
    * Generate Float Random Number
    *
    * @param float $min Minimal value
    * @param float $max Maximal value
    * @param int $round The optional number of decimal digits to round to. default 0 means not round
    * @return float Random float value
    */
    public function randomFloat($min, $max, $round = 0)
    {
        //validate input
        if ($min > $max) {
            $min = $max;
            $max = $min;
        } else {
            $min = $min;
            $max = $max;
        }
        $randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        if ($round>0) {
            $randomfloat = round($randomfloat, $round);
        }
        return $randomfloat;
    }

    /**
    * Generate a random string, using a cryptographically secure
    * pseudorandom number generator (random_int)
    *
    * For PHP 7, random_int is a PHP core function
    * For PHP 5.x, depends on https://github.com/paragonie/random_compat
    *
    * @param int $length      How many characters do we want? (default: 10)
    * @param string $keyspace A string of all possible characters
    *                         to select from
    * @return string
    */
    public function randomString(
        $length = 10,
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ) {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}
