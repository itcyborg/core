<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 9:56 PM
 */

namespace Core\Config;


use Core\App\Bootstrap\App;

class Config
{
    public function __construct()
    {
    }

    public static function readIni()
    {
        $file = 'Config.ini';
        return parse_ini_file(
            App::configDir() . $file, true
        );
    }

    public function __call($name, $arguments)
    {
        $config = self::readIni();
        return json_decode(json_encode(($arguments != null) ?
            $config[$name][$arguments[0]]
            :
            $config[$name]));
    }

    public static function __callStatic($name, $arguments)
    {
        $config = self::readIni();
        return json_decode(json_encode(($arguments != null) ?
            $config[$name][$arguments[0]]
            :
            $config[$name]));
    }
}