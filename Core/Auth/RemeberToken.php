<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/13/2018
 * Time: 11:20 AM
 */

namespace Core\Auth;


class RemeberToken implements \RememberToken
{

    /**
     * generate a random unique string
     * @param int $length
     * @return mixed
     */
    public function generate($length = 128)
    {
        // TODO: Implement generate() method.
    }

    /**
     * algorithm to use
     * @param $min
     * @param $max
     * @return mixed
     */
    public function algorithm($min, $max)
    {
        // TODO: Implement algorithm() method.
    }
}