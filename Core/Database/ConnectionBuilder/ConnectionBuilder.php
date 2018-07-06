<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 9:33 PM
 */

namespace Core\Database\ConnectionBuilder;

/**
 * Get resources
 */
use Core\Exceptions\ExceptionsHandler;
use PDO;

/**
 * Class ConnectionBuilder
 * @package Core\Database\ConnectionBuilder
 * Builds a connection to the database
 */
class ConnectionBuilder extends GetDatabaseConfig
{
    //vars
    protected static $connection;

    /**
     * @return PDO
     * @throws ExceptionsHandler
     * Connect to the database
     */
    private static function connect()
    {
        try{
            # Create a new PDO object and use it to connect to the database
            return new PDO(
                "mysql:host=" . self::$host . ";
                dbname=" . self::$database, // database name
                self::$username, // database username
                self::$password,
                $options = [
                    PDO::ATTR_EMULATE_PREPARES => true, // turn on emulation mode for "real" prepared statements
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //make the default fetch be both associative array and object
                ] # database options you need | optionsal
            );
        } catch (\PDOException $e) {
            // If any error, grab the message and code and handle it accordingly
            throw new ExceptionsHandler($e->getMessage(),$e->getCode());
        }
    }

    /**
     * @return mixed
     * @throws ExceptionsHandler
     * Get the connection object
     */
    protected static function getConnection()
    {
        parent::getConfig();// Get the current configuration
        return self::connect(); // Connect to the database
    }
}