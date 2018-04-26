<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/13/2018
 * Time: 11:20 AM
 */

namespace Core\Auth;


use Exception;

class PasswordService implements \PasswordService
{

    /**
     * hash password
     * @param $password
     * @return mixed
     */
    public function hash($password)
    {
//        self::hasLower($password);
//        self::hasUpper($password);
//        self::hasInteger($password);
        $options = [
            'cost' => 12
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    /**
     * verify password with hash
     * @param $password
     * @return mixed
     */
    #
    public static function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }

    /**
     * @param $token
     * @return mixed
     */
    public function hashToken($token)
    {
        $options = [
            'cost' => 12
        ];
        return password_hash($token, PASSWORD_BCRYPT, $options);
    }

    /**
     * check if password has lowercase
     * @param $password
     * @return mixed
     */
    public function hasLower($password)
    {
        if (preg_match("/[a-z]/", $password)) {
            return true;
        }
        throw new Exception("Password must contain at least one uppercase letter.");
    }

    /**
     * * check if password has uppercase
     * @param $password
     * @return mixed
     */
    public function hasUpper($password)
    {
        if (preg_match("/[A-Z]/", $password)) {
            return true;
        }
        throw new Exception("Password must contain at least one uppercase letter.");
    }

    /**
     * @param $password
     * @return mixed
     */
    public function hasInteger($password)
    {
        if (preg_match("/[0-9]/", $password)) {
            return true;
        }
        throw new Exception("Password must contain at least one number.");
    }

    /**
     * @param $password
     * @return mixed
     */
    public function hasSymbols($password)
    {
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
            return true;
        }
    }
}