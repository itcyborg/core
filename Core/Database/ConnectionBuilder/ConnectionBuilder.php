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
use Core\Config\Config;
use Core\Exceptions\ExceptionsHandler;
use PDO;

/**
 * Class ConnectionBuilder
 * @package Core\Database\ConnectionBuilder
 * Builds a connection to the database
 */
class ConnectionBuilder
{
    //vars
    private static $config;
    protected static $connection;
    protected static $host;
    protected static $port;
    protected static $database;
    protected static $username;
    protected static $password;

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
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_GROUP //make the default fetch be both associative array and object
                ] # database options you need | optional
            );
        } catch (\PDOException $e) {
            // If any error, grab the message and code and handle it accordingly
            throw new ExceptionsHandler($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Set the database configuration from the read app config file in Config dir
     */
    private static function setDBConfig()
    {
        self::$database = self::$config->database; # get the database name
        self::$host = self::$config->host; # get the host address
        self::$port = self::$config->port; # get the host port address
        self::$username = self::$config->username; # get the database user name
        self::$password = self::$config->password; # get the database user password
    }

    /**
     * @throws ExceptionsHandler
     * Read the app config file and extract the database connection settings
     */
    private static function getConfig()
    {
        try {
            // Extract the database connection settings from the read config and set it
            self::$config = Config::database();
        }catch (\Exception $e){
            // Catch any errors and handle it
            throw new ExceptionsHandler($e->getMessage(),$e->getCode());
        }
        // Set the settings of the database
        self::setDBConfig();
    }

    /**
     * @return mixed
     * @throws ExceptionsHandler
     * Get the connection object
     */
    protected static function getConnection()
    {
        self::getConfig();// Get the current configuration
        return self::connect(); // Connect to the database
    }
}