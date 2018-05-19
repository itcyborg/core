<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 1:08 PM
 */

namespace Core\Database\Migration;


class BluePrint
{
    public static function name($namespace, $class)
    {
        $name = explode($namespace . "\\", $class)[1];
        return $name;
    }
}