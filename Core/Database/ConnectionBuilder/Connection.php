<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 9:31 PM
 */

namespace Core\Database\ConnectionBuilder;

/**
 * Get the requirements
 */
use Core\Exceptions\ExceptionsHandler;

/**
 * Class Connection
 * @package Core\Database\ConnectionBuilder
 */
class Connection extends ConnectionBuilder
{
    /**
     * Get a connection object from the connection builder and return it
     * @return mixed
     */
    public static function connection()
    {
        try {
            # Return connection object
            return ConnectionBuilder::getConnection();
        } catch (ExceptionsHandler $e) {
            # If any errors occurred
            dd($e);
        }
    }
}