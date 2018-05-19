<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/6/2018
 * Time: 7:12 PM
 */

interface PasswordService
{
    ## Deals with passwords only
    /**
     * hash password
     * @param $password
     * @return mixed
     */
    public function hash($password);

    /**
     * verify password with hash
     * @param $password
     * @param $hash
     * @return mixed
     */
    public static function verify($password, $hash);

    /**
     * @param $token
     * @return mixed
     */
    public function hashToken($token);

    /**
     * check if password has lowercase
     * @param $password
     * @return mixed
     */
    public function hasLower($password);

    /**
     * * check if password has uppercase
     * @param $password
     * @return mixed
     */
    public function hasUpper($password);

    /**
     * @param $password
     * @return mixed
     */
    public function hasInteger($password);

    /**
     * @param $password
     * @return mixed
     */
    public function hasSymbols($password);
}