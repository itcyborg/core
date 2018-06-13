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
        if ($name == 'getURI') {
            if (sizeof($arguments) > 0) {
                if (isset($_SERVER['HTTPS'])) {
                    return trim('https://' . self::getBase() . '/' . $arguments[0], '/');
                } else {
                    return trim('http://' . self::getBase() . '/' . $arguments[0], '/');
                }
            } else {
                return 'no value entered';
            }
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