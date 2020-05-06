<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 10:19 AM
 */

namespace Core\Asset;

/**
 * Get all the resources
 */
use Core\App\Bootstrap\App;

/**
 * Class AssetLoader
 * @package Core\Asset
 * This class is used to load assets like css, fonts and scripts to the template engine
 */
class AssetLoader
{
    /**
     * @var string
     */
    protected static $assetDir = 'Public/';
    protected static $asset;
    private static $root;

    /**
     * Load our asset
     * @param $asset
     * @return string
     */
    public static function load($asset)
    {
        self::$root = App::getDocumentRoot();
        self::$asset = $asset;
        return self::find();
    }

    /**
     * Search for our asset
     * @return string
     */
    protected static function find()
    {
        /**
         * Check if our asset exists and if we can read it
         * Check if we are using the public folder or not, then load the necessary paths to the file
         * If we can't find the file or lack permission to read, then display an error
         */

        if (is_readable(self::$root . self::$assetDir . self::$asset)) {
            if (App::isPublic()) {
                return (string)self::$asset;
            } else {
                return 'Public/' . (string)self::$asset;
            }
        } else {
            echo 'Asset not found';
        }
    }
}