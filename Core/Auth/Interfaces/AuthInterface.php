<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/6/2018
 * Time: 7:11 PM
 */

interface AuthInterface
{
    /**
     * return user instance
     * @return mixed
     */
    public function user();

    /**
     * check if there is a user logged in
     * @return mixed
     */
    public function isLoggedIn();

    /**
     * set user instance
     * @param $user
     * @return mixed
     */
    public static function setUser($user);

    /**
     * return user id
     * @return mixed
     */
    public function id();

    /**
     * return user last login
     * @return mixed
     */
    public function lastLogin();

    /**
     * return the last time user record was updated
     * @return mixed
     */
    public function lastUpdated();

    /**
     * return the user creation time/date
     * @return mixed
     */
    public function createdAt();

    /**
     * return user routes
     * login/register/reset/verify routes
     * @return mixed
     */
    public function Routes();
}