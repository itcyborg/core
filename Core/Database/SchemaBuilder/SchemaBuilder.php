<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/8/2018
 * Time: 7:03 PM
 */

namespace Core\Database\SchemaBuilder;


class SchemaBuilder
{
    protected $query;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->query = "CREATE TABLE " . $table . " (";
    }

    public function varchar($fieldname, $size)
    {
        $this->query .= $fieldname . " VARCHAR (" . $size . ") ,";
    }

    public function text($fieldname, $size = null)
    {
        if ($size != null) {
            $this->query .= $fieldname . " TEXT (" . $size . ") ,";
        } else {
            $this->query .= $fieldname . " TEXT ,";
        }
    }

    public function integer($fieldname, $size)
    {
        return $this->query .= $fieldname . " INT(" . $size . ") ,";
    }

    public function double($fieldname)
    {
        return $this->query .= $fieldname . " DOUBLE  ,";
    }

    public function getQuery()
    {
        $this->query = trim($this->query, ",") . ");";
        return $this->query;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function timestamp($fieldname, $timestamp)
    {
        return $this->query .= "$fieldname timestamp DEFAULT current_timestamp,";
//        return $this->query .=$fieldname." TIMESTAMP DEFAULT '".$timestamp."',";

    }

    public function date($fieldname)
    {
        return $this->query .= $fieldname . " DATE ,";
    }

    public function time($fieldname)
    {
        return $this->query .= $fieldname . " TIME ,";
    }

    public function increments()
    {
        return $this->query .= "id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,";
    }

    public function timestamps()
    {
        return $this->query .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,";
    }
}