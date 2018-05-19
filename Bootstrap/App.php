<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 9:32 AM
 */

namespace Core\App\Bootstrap;

/**
 * Get all the resources required
 */
use Core\Exceptions\ExceptionsHandler;
use Core\Requests\Request;
use Core\Router\Router;

/**
 * Class App
 * @package Core\App\Bootstrap
 */
class App
{
    //vars
    public static $document_root;
    private static $public = true;

    /**
     * Start the Engines and Run
     */

    /**
     * @param $dir
     */
    public static function boot($dir)
    {
        //create default session
        @session_start();

        //enable error reporting
        error_reporting(E_ERROR);
        try {
            $request = new Request();
            //Set the document root
            self::setDocumentRoot($dir);

            /*
             * Load the routes file
             * Get the uri requested
             * Get the method used to request
             * Match and direct the uri and method to matching route in the route file loaded
             */

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
     * Return the document root
     * @return mixed
     */
    public static function getDocumentRoot()
    {
        return self::$document_root;
    }

    /**
     * Set the document root
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
    /**
     * Get the routes directory
     * @return string
     */
    public static function routesDir()
    {
        return self::getDocumentRoot() . '/routes/';
    }
    /**
     * Get the controller's directory
     * @return string
     */
    public static function controllerDir()
    {
        return self::getDocumentRoot() . '/App/Controllers/';
    }
    /**
     * Get the views directory
     * @return string
     */
    public static function viewsDir()
    {
        return self::getDocumentRoot() . '/App/Views/';
    }
    /**
     * Get the configuration directory
     * @return string
     */
    public static function configDir()
    {
        return self::getDocumentRoot() . '/Config/';
    }
    /**
     * Get the logs directory
     * @return string
     */
    public static function logDir()
    {
        return self::getDocumentRoot() . 'Storage/App/Logs/';
    }

    /**
     * Set the public directory
     * @param bool $public
     */
    public static function setPublic(bool $public)
    {
        self::$public = $public;
    }

    /**
     * Check to see if the application is launched from the public directory
     * @return bool
     */
    public static function isPublic()
    {
        return self::$public;
    }


}