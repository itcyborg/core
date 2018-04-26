<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/13/2018
 * Time: 11:19 AM
 */

namespace Core\Auth;


use Core\Database\DB\DB;

class Authenticate implements \Authenticate
{

    /**
     * check if user is registered
     * verify password with hash
     * set user session
     * @param $email
     * @param $password
     * @return mixed
     */
    public function validate($email, $password)
    {
        // TODO: Implement validate() method.
        $db = DB::FindColumn('users', [
            'email' => $email
        ]);
        if ($db['count'] !== 0) {
            if (PasswordService::verify($password, $db['result'][0]->password)) {
                Auth::setUser([
                    'session_id' => SessionManager::create([
                        'username' => $db['result'][0]->username,
                        'id' => $db['result'][0]->id,
                        'email' => $email,
                        'loggedin' => true
                    ]),
                    'username' => $db['result'][0]->username,
                    'id' => $db['result'][0]->id,
                    'email' => $email,
                    'loggedin' => true
                ]);
                return true;
            }
            throw new Exception("Invalid Email/Password combination. Check your details and try again.");
        }
        throw new Exception("Invalid Email/Password combination. Check your details and try again.");
    }
}