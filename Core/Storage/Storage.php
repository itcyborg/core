<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 6:14 PM
 */

namespace Core\Storage;
require "StorageInterface.php";
require "../../Bootstrap/App.php";

use Core\App\Bootstrap\App;
use Core\Exceptions\ExceptionsHandler;

class Storage implements StorageInterface
{
    private static $root;
    private static $storageRoot='Storage/';
    private static $type;
    private static $mime;
    private static $name;
    private static $tmp_file;
    private static $maxSize;
    private static $ext;
    private static $allowedMime;
    private static $allowedExt;
    private static $scope;
    private static $directory;

    public function __construct()
    {
        self::setRoot(App::getDocumentRoot());
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

    public static function store($path)
    {
        try{
            if (is_dir(self::$storageRoot)) {
                $destination = self::getRoot() . self::$storageRoot . $path;
                move_uploaded_file(self::$tmp_file, $destination);
            }
        }catch (\Exception $e){
            throw new ExceptionsHandler($e->getMessage(),$e->getCode());
        }
    }

    public static function put($filename, $path)
    {
        // TODO: Implement put() method.
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

    public static function getName($filepath)
    {
        return pathinfo($filepath, PATHINFO_BASENAME);
    }

    public static function setName($path, $name)
    {

    }


    public static function delete($filePath)
    {

    }

    public static function name($filename)
    {
        // TODO: Implement name() method.
    }

    public static function mime($filename)
    {
        // TODO: Implement mime() method.
    }

    public static function path($filename)
    {
        // TODO: Implement path() method.
    }
}

$upload = new Storage;
var_dump($upload::getRoot());
