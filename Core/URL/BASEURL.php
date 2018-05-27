<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 3/25/2018
 * Time: 6:35 PM
 */

namespace Core\URL;


/**
 * Class BASEURL
 * @package Core\URL
 */
class BASEURL
{
    /**
     * @var
     */
    public static $base;

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
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