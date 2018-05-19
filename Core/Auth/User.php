<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/13/2018
 * Time: 11:20 AM
 */

namespace Core\Auth;


class User extends GenericUser implements \User
{

    /**
     * create user
     * @param $email
     * @param $password
     * @param null $username [optional]
     * @return mixed
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
     */
    public function isUnique($email, $username)
    {
        $isUnique = true;
        $username_check = DB::FindColumn('users', ['username' => $username]);
        if ($username_check['count'] > 0) {
            $isUnique = false;
            Notifications::addError("Username Exists", Request::uri());
            throw new Exception("Username Exists");
        }
        $email_check = DB::FindColumn('users', ['email' => $email]);
        if ($email_check['count'] > 0) {
            $isUnique = false;
            Notifications::addError("Error registering using this email. Try another.", Request::uri());
            throw new Exception("Error registering using this email. Try another.");
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