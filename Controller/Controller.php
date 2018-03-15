<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 2:08 PM
 */

namespace Controller;

use App\Bootstrap\App;

class Controller
{
    public function __construct($controller, $action = null)
    {
        self::loadController($controller, $action);
    }

    private static function loadController($controller, $action = null)
    {
        /**
         * check if the controller directory exists
         * check if the controller exists and is readable
         * if the controller has an action, then instantiate the controller and do the action
         * else just instantiate the controller
         */

        if (is_dir(App::controllerDir())) {
            if (is_readable(App::controllerDir() . $controller . '.php')) {
                require App::controllerDir() . $controller . '.php';
                if ($action !== null) {
                    $controller = new $controller();
                    return $controller->$action();
                } else {
                    return new $controller();
                }
            } else {
                dd('not readable');
            }
        } else {
            echo "fail";
        }
    }
}