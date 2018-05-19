<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 3/26/2018
 * Time: 1:13 PM
 */

namespace Core\Logger;


interface LoggerInterface
{
    /**
     * Errors
     * Events
     * Requests
     * Debug
     * @param $msg
     * @return
     */
    public static function error($msg);
    public static function event($msg);
    public static function debug($msg);
    public static function request($msg);
    static function init();
}