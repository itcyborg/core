<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/6/2018
 * Time: 7:11 PM
 */

interface GenericUser
{
    /**
     * set email
     * @param $email
     * @return mixed
     */
    public function email($email);

    /**
     * set password
     * @param $password
     * @return mixed
     */
    public function password($password);

    /**
     * set confirm password
     * @param $confirmPassword
     * @return mixed
     */
    public function confirmPassword($confirmPassword);

    /**
     * set remember token
     * @return mixed
     */
    public function rememberToken();

    /**
     * set username
     * @param $username
     * @return mixed
     */
    public function username($username);

    /**
     * save the record
     * @return mixed
     */
    public function save();
}