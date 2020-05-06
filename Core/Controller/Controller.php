<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 2:08 PM
 */

namespace Core\Controller;

/**
 * Load the resources
 */
use Core\App\Bootstrap\App;
use Core\Exceptions\ExceptionsHandler;

/**
 * Class Controller
 * @package Core\Controller
 */
class Controller
{
    /**
     * Controller constructor.
     * @param $controller
     * @param null $action
     * @param null $params
     * @throws ExceptionsHandler
     */
    public function __construct($controller, $action = null, $params = null)
    {
        self::loadController($controller, $action, $params);
    }

    /**
     * @param $controller
     * @param null $action : this corresponds to the function name in the controller
     * @param null $params : this corresponds to the parameters to be passed to function in the controller
     * @throws ExceptionsHandler :catch any exception and handle it
     */
    private static function loadController($controller, $action = null, $params = null)
    {
        /**
         * check if the controller directory exists
         * check if the controller exists and is readable
         * if the controller has an action, then instantiate the controller and do the action
         * else just instantiate the controller
         */
        if (is_dir(App::controllerDir())) { # Check if it is a directory
            if (is_readable(App::controllerDir() . $controller . '.php')) { # Check if the file exists and is readable
                require App::controllerDir() . $controller . '.php'; # Require/add the file(Controller)
                if ($action !== null) { # If an action is specified
                    # Call the function in the controller and pass the parameters
                    ## This, '...' , is the splat/scatter operator. Visit https://lornajane.net/posts/2014/php-5-6-and-the-splat-operator for more info
                    if(method_exists(new $controller,$action)){
                        call_user_func([$controller, $action], ...array_values($params));
                    }else{
                        throw new ExceptionsHandler('Function: '.$action.'does not exist.',500);
                    }
                } else {# If no action is specified, then take the controller to be a single action
                    if (class_exists($controller)) {
                        new $controller(); // Launch the action
                    }
                }
            } else {
                throw new ExceptionsHandler('Controller not found/Controller not readable.',500);
            }
        } else {
            throw new ExceptionsHandler('Controller Directory not found',500);
        }
    }

    /**
     * Create a new Controller in App/Controllers directory
     * @param $name
     */
    public static function make($name)
    {
        // Search the directory if a file with the same name exists
        if (!file_exists(App::controllerDir() . $name . '.php')) {
            // Create a new file and open it for writing
            if ($controller = fopen(App::controllerDir() . $name . '.php', 'w')) {
                // Write the default controller structure to the file
                fwrite($controller,
                    '<?php ' . PHP_EOL .
                    'class ' . $name . '{' . PHP_EOL . PHP_EOL . '}'
                );
                // Close the file after writing it
                fclose($controller);
                // Output a success message after writing the controller to the directory
                echo "Controller '$name' successfully created.";
            } else {
                # If an error occurs exit
                die('Controller already exists.');
            }
        } else {
            # If a controller exists
            die('Controller already exists.');
        }
    }
}