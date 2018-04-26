<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/10/2018
 * Time: 8:48 PM
 */

namespace Core\Console;

use Core\Controller\Controller;
use Core\Database\Migration\Migration;
use Core\Jobs\JobManager;

class Console
{
    public static function input($input)
    {
        if ($input == null) {
            echo "No input entered.";
        }

        if ($input[1] == "migrate") {
            Migration::run();
        }

        if ($input[1] == "start") {
            self::serve();
        }

        if ($input[1] === 'make') {
            if (isset($input[2])) {
                $cmd = $input[2];
                if (strstr($cmd, '=')) {
                    $tmp = explode('=', $cmd);
                    self::make($tmp[0], $tmp[1]);
                } else {
                    die('No name provided');
                }
            }
        }
    }

    private static function serve()
    {
        echo "PHP DEVELOPMENT SERVER STARTED" . PHP_EOL;
        exec('php -S 127.0.0.1:80');
    }

    private static function make($type, $name)
    {
        switch ($type) {
            case 'table' | 'migration':
                {
                    Migration::make($name);
                    break;
                }
                break;
            case 'controller':
                Controller::make($name);
                break;
            case 'job':
                JobManager::make($name);
                break;
            default;
                return 'Unknown command';
                break;
        }
    }
}