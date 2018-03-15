<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 11:25 AM
 */

namespace Router;

use App\Bootstrap\App;
use Controller\Controller;
use Exceptions\ExceptionsHandler;

class Router
{
    public static $routes = [
        'GET' => [],
        'POST' => []
    ];

    private static $controller = [];
    private static $action = [];
    private static $parameters = [];
    private static $path;

    //load the routes file
    public static function load($file)
    {
        /**
         * create a new router instance
         * require the routes file
         * return the router instance
         */
        $router = new static;
        require $file;
        return $router;
    }

    //direct the request to the controller
    public static function direct($uri, $requestType)
    {
        /**
         * example.com/about/me
         * check if the uri is in the listed array routes
         */
        if (array_key_exists($uri, self::$routes[$requestType])) {
            //check if the controller directory exists
            if (is_dir(App::controllerDir())) {
                //create an instance of the controller
                new Controller(
                    (string)self::$controller[$uri],
                    self::$action[$uri][self::$controller[$uri]]
                );
            } else {
                //throw an error if directory is not found
                throw new ExceptionsHandler('Page not Found', 404);
            }
        } else {
            //if route is not listed in routes array, throw an error
            throw new ExceptionsHandler('Page not Found', 404);
        }
    }

    //handle all the get requests
    public static function get($uri, $controller)
    {
        /**
         * build a routes map
         * map the routes to their controllers and action
         * build the routes map with key being 'GET'
         * build the controller map with key being
         */
        if (strstr($controller, '@')) {
            /**
             * if controller has a specified action then split the action from the controller and the action
             * i.e 'controller@action' -> controller, action
             * create a map of controller with its keys being uri
             * create a map of actions with its keys being uri and controller
             * create a map of routes with its keys being request type and uri
             */
            $tmp = explode('@', $controller);
            self::$controller[$uri] = $tmp[0];
            self::$action[$uri][$tmp[0]] = $tmp[1];
            self::$routes['GET'][$uri] = self::$path . $tmp[0];
        } else {
            self::$controller[$uri] = $controller;
            self::$routes['GET'][$uri] = $controller;
        }
    }

    //handle all the post requests
    public static function post($uri, $controller)
    {
        /**
         * build a routes map
         * map the routes to their controllers and action
         * build the routes map with key being 'POST'
         * build the controller map with key being
         */
        if (strstr($controller, '@')) {
            /**
             * if controller has a specified action then split the action from the controller and the action
             * i.e 'controller@action' -> controller, action
             * create a map of controller with its keys being uri
             * create a map of actions with its keys being uri and controller
             * create a map of routes with its keys being request type and uri
             */
            $tmp = explode('@', $controller);
            self::$controller[$uri] = $tmp[0];
            self::$action[$uri][$tmp[0]] = $tmp[1];
            self::$routes['POST'][$uri] = self::$path . $tmp[0];
        } else {
            self::$controller[$uri] = $controller;
            self::$routes['POST'][$uri] = $controller;
        }
    }
}