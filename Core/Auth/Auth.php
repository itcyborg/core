<?php
namespace Core\Auth;

use Core\Requests\Request;
use Core\Router\Route;
use Core\URL\URL;

class Auth extends Authenticate implements \AuthInterface
{

    public static $user;

    /**
     * return user instance
     * @return mixed
     */
    public function user()
    {
        if (is_null(self::$user) && !is_null($_SESSION)) {
            if (isset($_SESSION['username'], $_SESSION['email'])) {
                self::$user['sessionid'] = session_id();
                foreach ($_SESSION as $item => $value) {
                    self::$user[$item] = $value;
                }
            }
        }
        return self::$user;
    }

    /**
     * check if there is a user logged in
     * @return mixed
     */
    public function isLoggedIn()
    {
        if (isset($_SESSION['username'], $_SESSION['email'])) {
            return true;
        } else {
            $url=URL::getURI('login/required');
            header("location:$url");
        }
    }

    /**
     * set user instance
     * @param $user
     * @return mixed
     */
    public static function setUser($user)
    {// takes all the user details from the sessionmanager and puts them in a variable
        // TODO: Implement setUser() method.
        self::$user=$user;

        /*
         * $user->id
         * $user->name
         * $user->email
         * $user->session_id
         * loggedd in
         */
    }

    /**
     * return user id
     * @return mixed
     */
    public function id()
    {
        // TODO:return the id of the logged in user.
        return self::$user['id'];
    }

    /**
     * return user last login
     * @return mixed
     */
    public function lastLogin()
    {
        return self::$user;
        // TODO: Implement lastLogin() method.
    }

    /**
     * return the last time user record was updated
     * @return mixed
     */
    public function lastUpdated()
    {
        // TODO: Implement lastUpdated() method.
    }

    /**
     * return the user creation time/date
     * @return mixed
     */
    public function createdAt()
    {
        // TODO: Implement createdAt() method.
    }

    /**
     * return user routes
     * login/register/reset/verify routes
     * @return mixed
     */
    public function Routes()
    {

        /**
         * login
         * register
         * reset
         */

        Route::get('login', 'LoginController@index');
        Route::get('login/required', 'LoginController@index');
        Route::post('login', 'LoginController@login');

        Route::get('register', 'RegisterController@index');
        Route::post('register', 'RegisterController@register');

        Route::get('reset', 'AuthController@index');
        Route::get('reset/verify/{id}', 'AuthController@verify');

        Route::post('reset', 'AuthController@reset');
        Route::post('recover', 'AuthController@recover');
    }
}