<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 9:33 PM
 */

namespace Core\Database\ConnectionBuilder;

use Core\Config\Config;
use Core\Exceptions\ExceptionsHandler;
use PDO;

class ConnectionBuilder
{
    private static $config;
    protected static $connection;
    protected static $host;
    protected static $port;
    protected static $database;
    protected static $username;
    protected static $password;

    private static function connect()
    {
        try{
            return new PDO(
                "mysql:host=" . self::$host . ";
                dbname=" . self::$database, // database name
                self::$username, // database username
                self::$password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (\PDOException $e) {
            throw new ExceptionsHandler($e->getMessage(),$e->getCode());
        }
    }

    private static function setDBConfig()
    {
        self::$database = self::$config->database;
        self::$host = self::$config->host;
        self::$port = self::$config->port;
        self::$username = self::$config->username;
        self::$password = self::$config->password;
    }

    private static function getConfig()
    {
        try {
            self::$config = Config::database();
        }catch (\Exception $e){
            throw new ExceptionsHandler($e->getMessage(),$e->getCode());
        }
        self::setDBConfig();
    }

    /**
     * @return mixed
     * @throws ExceptionsHandler
     */
    protected static function getConnection()
    {
        self::getConfig();
        return self::connect();
    }
}