<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 11:40 PM
 */

namespace Core\Storage;


class FileSystem
{
    private static $root;

    public static function createDir($path, $directory)
    {
        
    }

    public static function setAppRoot($root)
    {
        self::$root=$root;
    }

    public static function AppRoot()
    {
        return self::$root;
    }
}