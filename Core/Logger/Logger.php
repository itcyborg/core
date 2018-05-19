<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 3/26/2018
 * Time: 1:22 PM
 */

namespace Core\Logger;


use Core\App\Bootstrap\App;
use Core\Config\Config;
use Core\Exceptions\ExceptionsHandler;

class Logger implements LoggerInterface
{
    /**
     *
     */
    static function init()
    {
        $config = Config::debug();
        return $config;
    }

    /**
     * Errors
     * Events
     * Requests
     * Debug
     * @param $msg
     * @return void
     * @throws ExceptionsHandler
     */
    public static function error($msg)
    {
        self::init();
        return self::save($msg);
        // TODO: Implement error() method.
    }

    public static function event($msg)
    {
        // TODO: Implement event() method.
    }

    public static function debug($msg)
    {
        // TODO: Implement debug() method.

    }

    public static function request($msg)
    {
        // TODO: Implement request() method.
    }

    public static function save($msg, $type = null)
    {
        if (is_dir(App::logDir())) {
            if (!$file = fopen(App::logDir() . date('j_m_y') . '_log.log', 'a')) {
                throw new ExceptionsHandler('Failed');
            }
            fwrite($file, $msg . PHP_EOL);
            fclose($file);
        } else {
            dd(App::logDir());
        }
    }
}