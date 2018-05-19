<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 9:56 PM
 */

namespace Core\Config;

/**
 * Get the resources
 */
use Core\App\Bootstrap\App;

/**
 * Class Config
 * @package Core\Config
 */
class Config
{
    /**
     * Read our configuration file and process it
     * @return array|bool
     */
    public static function readIni()
    {
        $file = 'Config.ini';
        return parse_ini_file(
            App::configDir() . $file, true
        );
    }

    /**
     * Load our configuration when requested dynamically
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        //get the config
        $config = self::readIni();

        //convert it to an object
        return json_decode(json_encode(($arguments != null) ?
            $config[$name][$arguments[0]] //if section and property is requested
            :
            $config[$name])); //if section is requested only; will return an object with all the properties in the section
    }

    public static function __callStatic($name, $arguments)
    {
        //get the config
        $config = self::readIni();

        //convert it to an object
        return json_decode(json_encode(($arguments != null) ?
            $config[$name][$arguments[0]]  //if section and property is requested
            :
            $config[$name]));  //if section is requested only; will return an object with all the properties in the section
    }
}