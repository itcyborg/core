<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/13/2018
 * Time: 11:19 AM
 */

namespace Core\Auth;


use Core\Database\DB\DB;
use Core\SessionManager\SessionManager;
use Core\Exceptions\ExceptionsHandler;

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
        $db = DB::where('users', 
            'email',$email
        );
        //dd($db);
        if (count($db) !== 0) {
            if (PasswordService::verify($password, $db['password'])) {
                DB::add('logins',['user_id'],[$db['id']]);
               /* dd(SessionManager::create([
                        'username' => $db['result'][0]->username,
                        'id' => $db['result'][0]->id,
                        'email' => $email,
                        'loggedin' => true
                    ]));
                    */
                Auth::setUser([
                    'session_id' => SessionManager::create([
                        'username' => $db['username'],
                        'id' => $db['id'],
                        'email' => $email,
                        'updated_at'=> $db['updated_at'],
                        'created_at'=>$db['created_at'],
                        'loggedin' => true
                    ]),
                    'username' => $db['username'],
                    'id' => $db['id'],
                    'email' => $email,
                    'updated_at'=> $db['updated_at'],
                    'created_at'=>$db['created_at'],
                    'loggedin' => true
                ]);
                return true;
                /*
                 *
                 *session id=>(username,id,email,loggedin)|| return session,
                 * username,
                 * id,
                 * email,
                 * loggedin
                 *
                 */

            }
            throw new ExceptionsHandler("Invalid Email/Password combination. Check your details and try again.");
        }
        throw new ExceptionsHandler("Invalid Email/Password combination. Check your details and try again.");
    }
}