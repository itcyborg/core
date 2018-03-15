<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 9:32 AM
 */

namespace App\Bootstrap;


use Exceptions\ExceptionsHandler;
use Requests\Request;
use Router\Router;

class App
{
    public static $document_root;

    //start the engines
    public static function boot($dir)
    {
        try {
            self::setDocumentRoot($dir);
            Router::load(
                App::routesDir() . 'routes.php'
            )->direct(
                Request::uri(), Request::method()
            );
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }

    /**
     * @return mixed
     */
    public static function getDocumentRoot()
    {
        return self::$document_root;
    }

    /**
     * @param mixed $document_root
     */
    public static function setDocumentRoot($document_root)
    {
        self::$document_root = $document_root;
    }

    public static function routesDir()
    {
        return self::getDocumentRoot() . '/routes/';
    }

    public static function controllerDir()
    {
        return self::getDocumentRoot() . '/Controllers/';
    }

    public static function viewsDir()
    {
        return self::getDocumentRoot() . '/Views/';
    }
}