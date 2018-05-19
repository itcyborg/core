<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 3/25/2018
 * Time: 6:35 PM
 */

namespace Core\URL;


class BASEURL
{
    public static $base;

    public static function __callStatic($name, $arguments)
    {
        if ($name == 'getBase') {
            return self::getBase();
        }
    }

    /**
     * @return mixed
     */
    public static function getBase()
    {
        return $_SERVER['SERVER_NAME'];
    }
}