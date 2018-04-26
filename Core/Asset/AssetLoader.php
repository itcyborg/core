<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 10:19 AM
 */

namespace Core\Asset;


use Core\App\Bootstrap\App;

/**
 * @property mixed root
 */
class AssetLoader
{
    protected static $assetDir = 'Public/';
    protected static $asset;
    private static $root;

    public static function load($asset)
    {
        self::$root = App::getDocumentRoot();
        self::$asset = $asset;
        return self::find();
    }

    protected static function find()
    {
        if (is_readable(self::$root . self::$assetDir . self::$asset)) {
            if (App::isPublic()) {
                return (string)self::$asset;
            } else {
                return 'Public/' . (string)self::$asset;
            }
        } else {
            dd("failed");
        }
    }
}