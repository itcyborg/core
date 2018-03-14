<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 6:14 PM
 */

namespace Storage;

use Exceptions\ExceptionsHandler;
use Storage\FileSystem;

/**
 * @property  storageRoot
 */
class Storage extends FileSystem
{
    private static $root;
    private static $storageRoot='Storage/';

    public function __construct()
    {
        self::setRoot(self::AppRoot());
    }

    /**
     * @return mixed
     */
    public static function getRoot()
    {
        return self::$root;
    }

    /**
     * @param mixed $root
     */
    public static function setRoot($root)
    {
        self::$root = $root;
    }

    public static function store($file,$dest)
    {
        try{
            $destination=self::getRoot().self::$storageRoot.$dest;
            move_uploaded_file($file,$destination);
        }catch (\Exception $e){
            throw new ExceptionsHandler($e->getMessage(),$e->getCode());
        }
    }

    public static function put()
    {
    }

    public static function get($file)
    {
    }

    public static function download($file)
    {
    }

    public static function getSize()
    {
    }

    public static function getMime()
    {
    }

    public static function getExt()
    {
    }

    public static function getPath()
    {
    }

    public static function getName()
    {
    }

    private static function setName()
    {
    }
}