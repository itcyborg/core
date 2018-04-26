<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/6/2018
 * Time: 8:11 PM
 */

interface User
{
    /**
     * create user
     * @param $email
     * @param $password
     * @param null $username [optional]
     * @return mixed
     */
    public function create($email, $password, $username = null);

    /**
     * check if user exists
     * @param $email
     * @param $username
     * @return mixed
     */
    public function isUnique($email, $username);

    /**
     * destroy all sessions
     * @return mixed
     */
    public function logout();

    /**
     * login user using email/password
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login($email, $password);

    /**
     * request account recovery code/link
     * @param $email
     * @return mixed
     */
    public function reset($email);
}