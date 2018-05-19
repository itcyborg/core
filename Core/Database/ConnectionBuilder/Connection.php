<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 9:31 PM
 */

namespace Core\Database\ConnectionBuilder;

use Core\Exceptions\ExceptionsHandler;

class Connection extends ConnectionBuilder
{
    public static function connection()
    {
        try {
            return ConnectionBuilder::getConnection();
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }
}