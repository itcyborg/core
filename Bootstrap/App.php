<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 9:32 AM
 */

namespace Core\App\Bootstrap;


use Core\Exceptions\ExceptionsHandler;
use Core\Requests\Request;
use Core\Router\Router;

class App
{
    public static $document_root;

    //start the engines
    public static function boot($dir)
    {
        try {
            $request = new Request();
            self::setDocumentRoot($dir);
            Router::load(
                App::routesDir() . 'routes.php'
            )->direct(
                $request->uri(), $request->method()
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
        if (strstr($document_root, 'Public/..')) {
            self::$document_root = explode('Public/../', $document_root)[0];
        } else {
            self::$document_root = $document_root . "/";
        }
    }

    public static function routesDir()
    {
        return self::getDocumentRoot() . '/routes/';
    }

    public static function controllerDir()
    {
        return self::getDocumentRoot() . '/App/Controllers/';
    }

    public static function viewsDir()
    {
        return self::getDocumentRoot() . '/App/Views/';
    }

    public static function configDir()
    {
        return self::getDocumentRoot() . '/Config/';
    }

    public static function logDir()
    {
        return self::getDocumentRoot() . 'Storage/App/Logs/';
    }
}