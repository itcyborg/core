<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 3/22/2018
 * Time: 10:01 PM
 */

namespace Core\Router;

use Core\Controller\Controller;
use Core\Exceptions\ExceptionsHandler;

/**
 * Class Router
 * @package Core\Router
 */
class Router
{
    /**
     * @var
     */
    public static $route;
    /**
     * @var
     */
    public static $controller;
    /**
     * @var
     */
    private static $action;

    /**
     * @param $file
     * @return Router
     */
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    /**
     * @param $uri
     * @param $requestType
     * @throws ExceptionsHandler
     */
    public static function direct($uri, $requestType)
    {
        if (!self::match($uri, $requestType)) {
            throw new ExceptionsHandler('Page not Found', 404);
        }
    }

    /**
     * @param $uri
     * @param $requestType
     * @return bool|mixed
     */
    protected static function match($uri, $requestType)
    {
        foreach (array_keys(self::$route[$requestType]) as $route) {
            if (preg_match($route, $uri)) {
                if (is_callable(self::$route[$requestType][$route])) {
                    if ($params = RoutePattern::getParams($route, $uri)) {
                        call_user_func(self::$route[$requestType][$route], ...array_values($params));
                        return true;
                    } else {
                        return call_user_func(self::$route[$requestType][$route]);
                    }
                } else {
                    if ($params = RoutePattern::getParams($route, $uri)) {
                        try {
                            new Controller(
                                self::$route[$requestType][$route],
                                self::$action[$requestType][$route][self::$route[$requestType][$route]],
                                $params
                            );
                        } catch (ExceptionsHandler $e) {
                        }
                    } else {
                        try {
                            new Controller(
                                self::$route[$requestType][$route],
                                self::$action[$requestType][$route][self::$route[$requestType][$route]]
                            );
                        } catch (ExceptionsHandler $e) {
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param $pattern
     * @param $controller
     */
    public static function get($pattern, $controller)
    {
        $regex = RoutePattern::getRegex($pattern);
        if (!is_callable($controller)) {
            if (strstr($controller, '@')) {
                $tmp = explode('@', $controller);
                self::$route['GET'][$regex] = $tmp[0];
                self::$controller['GET'][$regex] = $tmp[0];
                self::$action['GET'][$regex][$tmp[0]] = $tmp[1];
            } else {
                self::$route['GET'][$regex] = $controller;
                self::$action['GET'][$regex][$controller] = null;
            }
        } else {
            self::$route['GET'][$regex] = $controller;
        }
    }

    /**
     * @param $pattern
     * @param $controller
     */
    public static function post($pattern, $controller)
    {
        $regex = RoutePattern::getRegex($pattern);
        if (!is_callable($controller)) {
            if (strstr($controller, '@')) {
                $tmp = explode('@', $controller);
                self::$route['POST'][$regex] = $tmp[0];
                self::$controller['POST'][$regex] = $tmp[0];
                self::$action['POST'][$regex][$tmp[0]] = $tmp[1];
            } else {
                self::$route['POST'][$regex] = $controller;
                self::$action['POST'][$regex][$controller] = null;
            }
        } else {
            self::$route['GET'][$regex] = $controller;
        }
    }
}