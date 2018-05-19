<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/6/2018
 * Time: 8:10 PM
 */

interface RememberToken
{
    /**
     * generate a random unique string
     * @param int $length
     * @return mixed
     */
    public function generate($length = 128);

    /**
     * algorithm to use
     * @param $min
     * @param $max
     * @return mixed
     */
    public function algorithm($min, $max);
}