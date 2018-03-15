<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 6:14 PM
 */

namespace Storage;

use Exceptions\ExceptionsHandler;

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

    public static function store($path, $file)
    {
        try{
            if (is_dir(self::$storageRoot)) {
                $destination = self::getRoot() . self::$storageRoot . $path;
                move_uploaded_file($file, $destination);
            }
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

    public static function getSize($filepath)
    {
        return filesize($filepath);
    }

    public static function getMime($filepath)
    {
        return mime_content_type($filepath);
    }

    public static function getExt($filepath)
    {
        return pathinfo($filepath, PATHINFO_EXTENSION);
    }

    public static function getPath()
    {
    }

    public static function getName($filepath)
    {
        return pathinfo($filepath, PATHINFO_BASENAME);
    }

    private static function setName()
    {

    }

    public static function deleteDir($directoryPath)
    {
    }

    public static function delete($filePath)
    {

    }
}
