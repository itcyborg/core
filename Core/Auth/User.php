<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/13/2018
 * Time: 11:20 AM
 */

namespace Core\Auth;


use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;

class User extends GenericUser implements \User
{

    /**
     * create user
     * @param $email
     * @param $password
     * @param null $username [optional]
     * @return mixed
     * @throws ExceptionsHandler
     */
    public function create($email, $password, $username = null)
    {
        if ($msg = self::isUnique($email, $username)) {
            self::username($username);
            self::email($email);
            self::password($password);
            self::confirmPassword($password);
            $new = new static;
            return $new->save();
        }
    }

    /**
     * check if user exists
     * @param $email
     * @param $username
     * @return mixed
     * @throws ExceptionsHandler
     */
    public function isUnique($email, $username)
    {
        $isUnique = true;
        $username_check = DB::one('users', 'username','username',$username);
        if ($username_check) {
            $isUnique = false;
            throw new ExceptionsHandler("Username Exists");
        }
        $email_check =  DB::one('users', 'email','email',$email);
        if ($email_check) {
            $isUnique = false;
            throw new ExceptionsHandler("Error registering using this email. Try another.");
        }
        return $isUnique;
    }

    /**
     * destroy all sessions
     * @return mixed
     */
    public function logout()
    {
        // TODO: Implement logout() method.
    }

    /**
     * login user using email/password
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login($email, $password)
    {
        // TODO: Implement login() method.
    }

    /**
     * request account recovery code/link
     * @param $email
     * @return mixed
     */
    public function reset($email)
    {
        // TODO: Implement reset() method.
    }
}