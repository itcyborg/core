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

class Router
{
    public static $route;
    public static $controller;
    private static $action;

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public static function direct($uri, $requestType)
    {
        if (!self::match($uri, $requestType)) {
            throw new ExceptionsHandler('Page not Found', 404);
        }
    }

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
                        new Controller(
                            self::$route[$requestType][$route],
                            self::$action[$requestType][$route][self::$route[$requestType][$route]],
                            $params
                        );
                    } else {
                        new Controller(
                            self::$route[$requestType][$route],
                            self::$action[$requestType][$route][self::$route[$requestType][$route]]
                        );
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