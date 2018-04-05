<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 10:14 PM
 */

namespace Core\Exceptions;


use Core\Config\Config;
use Core\Logger\Logger;
use Throwable;

class ExceptionsHandler extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        if ($code == 405) {
            die('Page not found');
        }
        if (Config::debug('debug')) {
            Logger::error($message . PHP_EOL . json_encode($this->getTrace()) . PHP_EOL);
        } else {
            return Logger::error($message);
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