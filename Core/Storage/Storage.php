<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 6:14 PM
 */

namespace Core\Storage;

use Core\App\Bootstrap\App;
use Core\Exceptions\ExceptionsHandler;

class Storage
{
    private static $root;
    private static $storageRoot = 'Storage/';
    private static $public = 'Public/';

    public function __construct()
    {
        self::$root = App::getDocumentRoot();
    }

    /** Store files Publicly
     * @param $file
     * @return string
     * @throws ExceptionsHandler
     */
    public static function store($file)
    {
        if (is_dir(self::$storageRoot)) {
            $destination = self::$storageRoot . self::$public . self::uniqueName() . '.' . self::getExt($file);
            if (!is_dir(self::$storageRoot . self::$public)) {
                mkdir(self::$storageRoot . self::$public);
            }
            if (move_uploaded_file($file->tmp_name, $destination)) {
                return $destination;
            } else {
                if ($file->error > 0) {
                    $error = $file->error;
                    self::generateError($error);
                }
                throw new ExceptionsHandler('Unknown Error Occured', 10);
            }
        }
    }

    public static function put($file, $destinationDir = null)
    {
        if (is_dir(self::$storageRoot)) {
            $destination = self::$storageRoot . self::uniqueName() . '.' . self::getExt($file);
            if ($destinationDir != null) {
                $destination = self::$storageRoot . $destinationDir . '/' . self::uniqueName() . '.' . self::getExt($file);
                if (!is_dir(self::$storageRoot . $destinationDir)) {
                    mkdir(self::$storageRoot . $destinationDir);
                    dd('dir created');
                }
            }
            if (move_uploaded_file($file->tmp_name, $destination)) {
                return $destination;
            } else {
                if ($file->error > 0) {
                    $error = $file->error;
                    self::generateError($error);
                }
                throw new ExceptionsHandler('Unknown Error Occured', 10);
            }
        }
    }

    protected static function uniqueName()
    {
        $idkeyspace = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
        $length = 16;
        $idstr = array();
        $max = strlen($idkeyspace) - 1;
        for ($i = 0; $i < $length; ++$i) {
            $n = rand(0, $max);
            $idstr[] = $idkeyspace[$n];
        }

        return implode($idstr);
    }

    private static function generateError($error)
    {
        switch ($error) {
            case (1):
                throw new ExceptionsHandler('The uploaded file exceeds the upload_max_filesize directive.Max allowed is ' . ini_get('upload_max_filesize'), 1);
                break;
            case (2):
                throw new ExceptionsHandler('File size exceeds MAX_FILE_DIRECTIVE specified in html form.', 2);
                break;
            case (3):
                throw new ExceptionsHandler('The uploaded file was only partially uploaded.', 3);
                break;
            case (4):
                throw new ExceptionsHandler('No file was uploaded.', 4);
                break;
            case (6):
                throw new ExceptionsHandler('Missing a temporary folder', 6);
                break;
            case (7):
                throw new ExceptionsHandler('Failed to write file to disk.', 7);
                break;
            case (8):
                throw new ExceptionsHandler(' A PHP extension stopped the file upload.', 8);
                break;
            default:
                throw new ExceptionsHandler('Unknown Error Occurred', $error);
                break;
        }
    }

    private static function getExt($file)
    {
        return pathinfo($file->name, PATHINFO_EXTENSION);
    }
}