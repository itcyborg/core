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
        return self::$query = sprintf('select * from %s where id= "%s"', $table, $id);
    }

    public static function one($table, $field, $value, $data)
    {
        return self::$query = "SELECT " . $value . " FROM " . $table . " WHERE " . $field . "=" . $data;
    }

    public static function where($table, $field, $value)
    {
        return self::$query = "SELECT * FROM " . $table . " WHERE " . $field . "= '" . $value . "'";
    }

    public static function delete($table, $field, $value)
    {
        return self::$query = "DELETE FROM " . $table . " WHERE " . $field . "=" . $value;
    }

    public static function deleteAll($table)
    {
        return self::$query = "DELETE FROM " . $table;
    }

    public static function update($table, $fields, $values, $target, $data)
    {
        for ($i = 0; $i < count($fields); $i++) {
            return self::$query = "UPDATE " . $table . " SET " . $fields[$i] . "='" . $values[$i] . "' WHERE " . $target . " = " . $data;
        }
    }

    public static function add($table, $fields, $values)
    {
        $sql = "INSERT INTO " . $table . "(";
        for ($i = 0; $i < count($fields); $i++) {
            $sql .= $fields[$i] . ",";
        }
        $sql = (substr($sql, -1) == ',') ? substr($sql, 0, -1) : $sql;
        $sql .= ") VALUES(";
        for ($i = 0; $i < count($values); $i++) {
            $sql .= "'" . $values[$i] . "',";
        }
        return self::$query = (substr($sql, -1) == ',') ? substr($sql, 0, -1) : $sql;
        $sql .= ")";
    }

}

