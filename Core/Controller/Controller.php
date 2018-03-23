<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 2:08 PM
 */

namespace Core\Controller;

use Core\App\Bootstrap\App;
use Core\Exceptions\ExceptionsHandler;

class Controller
{
    public function __construct($controller, $action = null, $params = null)
    {
        self::loadController($controller, $action, $params);
    }

    private static function loadController($controller, $action = null, $params = null)
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
                    call_user_func([$controller, $action], ...array_values($params));
                } else {
                    if (class_exists($controller)) {
                        new $controller();
                    }
                }
            } else {
                throw new ExceptionsHandler('Controller not found/Controller not readable.');
            }
        } else {
            throw new ExceptionsHandler('Controller Directory not found');
        }
    }
}