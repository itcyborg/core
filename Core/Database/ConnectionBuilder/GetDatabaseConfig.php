<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 9:34 PM
 */

namespace Core\Database\ConnectionBuilder;

use Core\Config\Config;
use Core\Exceptions\ExceptionsHandler;

/**
 * Class GetDatabaseConfig
 * @package Core\Database\ConnectionBuilder
 * This class is used as an accessor to the get database configuration settings from the config interface
 */
class GetDatabaseConfig
{
    private static $config;
    protected static $host;
    protected static $port;
    protected static $database;
    protected static $username;
    protected static $password;

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
    public static function getConfig()
    {
        try {
            // Extract the database connection settings from the read config and set it
            self::$config = Config::database();
        } catch (\Exception $e) {
            // Catch any errors and handle it
            throw new ExceptionsHandler($e->getMessage(), $e->getCode());
        }
        // Set the settings of the database
        self::setDBConfig();
    }
}