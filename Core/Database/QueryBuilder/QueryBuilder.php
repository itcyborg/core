<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 10:29 AM
 */

namespace Database\QueryBuilder;

use Core\Database\ConnectionBuilder\Connection;

class QueryBuilder extends Connection
{
    private static $query;
    public static function all($table,array $columns=null)
    {
        return self::$query = sprintf('select * from %s', $table);
    }

    public static function columns($table,array $columns)
    {
    }

    public static function find($table,$id)
    {
    }

}

