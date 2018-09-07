<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/13/2018
 * Time: 12:07 PM
 */

namespace Core\Auth;


use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;

class GenericUser implements \GenericUser
{
    private static $email;
    private static $username;
    private static $password;
    private static $confirm_password;
    /**
     * set email
     * @param $email
     * @return mixed
     */
    public function email($email)
    {
        // TODO: Implement email() method.
        self::$email = $email;
    }

    /**
     * set password
     * @param $password
     * @return mixed
     */
    public function password($password)
    {
        // TODO: Implement password() method.
        self::$password=$password;
    }

    /**
     * set confirm password
     * @param $confirmPassword
     * @return mixed
     */
    public function confirmPassword($confirmPassword)
    {
        // TODO: Implement confirmPassword() method.
        self::$confirm_password=$confirmPassword;
    }

    /**
     * set remember token
     * @return mixed
     */
    public function rememberToken()
    {
        // TODO: Implement rememberToken() method.
    }

    /**
     * set username
     * @param $username
     * @return mixed
     */
    public function username($username)
    {
        // TODO: Implement username() method.
        self::$username=$username;
    }

    /**
     * save the record
     * @return mixed
     */
    public function save()
    {
        // TODO: Implement save() method.
        try{
            return DB::add('users',['username','email','password'],[self::$username,self::$email,self::$password]);
        }catch (\Throwable $e){
            return false;
        }
    }
}