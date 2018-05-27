<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/16/2018
 * Time: 2:02 PM
 */

namespace Core\Storage;


/**
 * Interface StorageInterface
 * @package Core\Storage
 */
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

    /**
     * @param $filename
     * @return mixed
     */
    public static function name($filename);

    /**
     * @param $filename
     * @return mixed
     */
    public static function mime($filename);

    /**
     * @param $filename
     * @return mixed
     */
    public static function getExt($filename);

    /**
     * @param $filename
     * @return mixed
     */
    public static function path($filename);

    /**
     * @param $filename
     * @return mixed
     */
    public static function download($filename);

    /**
     * @param $filepath
     * @return mixed
     */
    public static function delete($filepath);

    /**
     * @param $path
     * @param $name
     * @return mixed
     */
    public static function setName($path, $name);

    /**
     * @param $filename
     * @return mixed
     */
    public static function get($filename);

    /**
     * @param $filename
     * @return mixed
     */
    public static function store($filename);

    /**
     * @param $filename
     * @param $path
     * @return mixed
     */
    public static function put($filename, $path);
}