<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 10:14 PM
 */

namespace Core\Exceptions;


use Core\App\Bootstrap\App;
use Core\Config\Config;
use Core\Logger\Logger;
use Throwable;

class ExceptionsHandler extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        if($code==500){
            http_response_code(500);
            if(file_exists(App::viewsDir().'/error/500.html')){
                die(include App::viewsDir().'/error/500.html');
            }
        }
        if ($code == 405) {
            die('Page not found');
        }
        if($code==404){
            http_response_code(404);
            if(file_exists(App::viewsDir().'/error/404.html')){
                die(include App::viewsDir().'/error/404.html');
            }
            die('Page not found');
        }
        if (Config::debug('debug')) {
            Logger::error('[File:(' . $this->getFile() . '), Line: ' . $this->getLine() . ']:' . PHP_EOL . $message . PHP_EOL);
        } else {
            return Logger::error($message, 'Exception');
        }
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }


    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }


    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @param mixed $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

}