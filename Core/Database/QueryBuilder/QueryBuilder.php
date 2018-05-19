<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 10:29 AM
 */

namespace Database\QueryBuilder;

use Core\Database\ConnectionBuilder\Connection;
use Core\Database\ConnectionBuilder\ConnectionBuilder;

/**
 * Class QueryBuilder
 * @package Database\QueryBuilder
 */
class QueryBuilder extends Connection
{
    /**
     * @var
     */
    private static $query;

    /**
     * @param $table
     * @param array|null $columns
     * @return mixed
     */
    public static function all($table, array $columns = null)
    {
        try {
            $pdo = ConnectionBuilder::getConnection();
            self::$query = sprintf('select * from %s', $table);
            $stmt = $pdo->prepare(self::$query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * @param $table
     * @param array $columns
     */
    public static function columns($table, array $columns)
    {
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public static function find($table, $id)
    {
        self::$query = sprintf('select * from %s where id= "%s"', $table, $id);
        try {
            $pdo = ConnectionBuilder::getConnection();
            $stmt = $pdo->prepare(self::$query);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * @param $table
     * @param $field
     * @param $value
     * @param $data
     * @return mixed
     */
    public static function one($table, $field, $value, $data)
    {
        self::$query = "SELECT " . $value . " FROM " . $table . " WHERE " . $field . "=" . $data;
        try {
            $pdo = ConnectionBuilder::getConnection();
            $stmt = $pdo->prepare(self::$query);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * @param $table
     * @param $field
     * @param $value
     * @return mixed
     */
    public static function where($table, $field, $value)
    {
        self::$query = "SELECT * FROM " . $table . " WHERE " . $field . "= '" . $value . "'";
        try {
            $pdo = ConnectionBuilder::getConnection();
            $stmt = $pdo->prepare(self::$query);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * @param $table
     * @param $field
     * @param $value
     * @return mixed
     */
    public static function delete($table, $field, $value)
    {
        self::$query = "DELETE FROM " . $table . " WHERE " . $field . "=" . $value;
        try {
            $pdo = ConnectionBuilder::getConnection();
            $stmt = $pdo->prepare(self::$query);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * @param $table
     * @return mixed
     */
    public static function deleteAll($table)
    {
        self::$query = "DELETE FROM " . $table;
        try {
            $pdo = ConnectionBuilder::getConnection();
            $stmt = $pdo->prepare(self::$query);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    /**
     * @param $table
     * @param $fields
     * @param $values
     * @param $target
     * @param $data
     * @return mixed
     */
    public static function update($table, $fields, $values, $target, $data)
    {
        for ($i = 0; $i < count($fields); $i++) {
            self::$query = "UPDATE " . $table . " SET " . $fields[$i] . "='" . $values[$i] . "' WHERE " . $target . " = " . $data;
        }
        return self::$query;
    }

    /**
     * @param $table
     * @param $fields
     * @param $values
     * @return mixed
     */
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
        self::$query = (substr($sql, -1) == ',') ? substr($sql, 0, -1) : $sql;
        self::$query .= ")";
        try {
            $pdo = ConnectionBuilder::getConnection();
            $stmt = $pdo->prepare(self::$query);
            $stmt->execute();
            return $pdo->lastInsertId();
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

}

