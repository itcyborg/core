<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/6/2018
 * Time: 7:11 PM
 */

interface Authenticate
{
    /**
     * check if user is registered
     * verify password with hash
     * set user session
     * @param $email
     * @param $password
     * @return mixed
     */
    public function validate($email, $password);
}