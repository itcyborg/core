<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 11:25 AM
 */

namespace Core\Requests;


class Request
{
    public static $request;
    private static $previous = '/';

    //get the request uri
    public static function uri()
    {
        //remove the trailing / if any
        $uri = trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            "/"
        );
        if (isset($_SERVER['HTTP_REFERER'])) {
            self::setPrevious($_SERVER['HTTP_REFERER']);
        }
        return $uri;
    }

    /**
     * @return mixed
     */
    public static function getPrevious()
    {
        return self::$previous;
    }

    /**
     * @param mixed $previous
     */
    public static function setPrevious($previous)
    {
        self::$previous = $previous;
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}