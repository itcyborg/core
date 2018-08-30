<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/10/2018
 * Time: 8:48 PM
 */

namespace Core\Console;

/**
 * Get the resources
 */
use Core\Controller\Controller;
use Core\Database\Migration\Migration;
use Core\Jobs\JobManager;

/**
 * Class Console
 *  Used to interact with the application via terminal/cmd
 * @package Core\Console
 */
class Console
{
    /**
     * Capture the user's input
     * @param $input
     */
    public static function input($input)
    {
        /*
         * check if the input has something
         */
        if ($input == null) {
            echo "No input entered.";
            return;
        }

        /**
         * Execute the commands or pass them to their executors
         */

        # Command that triggers migration to run
        if ($input[1] == "migrate") {
            Migration::run();
        }

        # Command that triggers the server to start
        if ($input[1] == "start") {
            self::serve();
        }

        # Command that creates something i.e controller, migration table, job/task, etc
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

    /**
     * Launch the php internal server if supported
     */
    private static function serve()
    {
        echo "PHP DEVELOPMENT SERVER STARTED" . PHP_EOL;
        exec('php -S 127.0.0.1:80');
    }

    /**
     * Create something i.e Migrations, Controllers, etc
     * @param $type
     * @param $name
     * @return string
     */
    private static function make($type, $name)
    {
        switch ($type) { #check the command name and direct it to the respectful function
            case 'migration': # Migration is used to create a migration/table structure
                {
                    # Create the migration
                    Migration::make($name);
                    break;
                }
                break;
            case 'controller': # Controller is used to create a Controller
                {
                    # Create the controller
                    Controller::make($name);
                    break;
                }
            case 'task':  # Task is used to create a new Task for use in Windows
                # Create the task
                JobManager::make($name);
                break;
            default; # If command is unknown return an error
                return 'Unknown command';
                break;
        }
    }
}