<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/13/2018
 * Time: 12:35 PM
 */

namespace Core\Notifications;


class Notifications
{
    public static $notifications = array();

    public static function add($title, $msg)
    {
        self::$notifications[$title] = $msg;
        if (isset($_SESSION)) {
            $_SESSION[$title] = $msg;
        } else {
            $_SESSION[$title] = $msg;
        }
    }

    public static function getNotifications($title)
    {
        echo self::$notifications[$title];
    }
}