<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/16/2018
 * Time: 2:02 PM
 */

namespace Core\Storage;


interface StorageInterface
{
    /** functions:
     * file size
     * file name
     * file mime type
     * file extension
     * file path
     * file download
     * file delete
     * @param $filename
     * @return
     */

    public static function getSize($filename);

    public static function name($filename);

    public static function mime($filename);

    public static function getExt($filename);

    public static function path($filename);

    public static function download($filename);

    public static function delete($filepath);

    public static function setName($path, $name);

    public static function get($filename);

    public static function store($filename);

    public static function put($filename, $path);
}