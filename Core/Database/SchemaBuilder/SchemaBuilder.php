<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/8/2018
 * Time: 7:03 PM
 */

namespace Core\Database\SchemaBuilder;


/**
 * Class SchemaBuilder
 * @package Core\Database\SchemaBuilder
 */
class SchemaBuilder
{
    /**
     * @var string
     */
    protected $query;
    /**
     * @var
     */
    protected $table;

    /**
     * SchemaBuilder constructor.
     * @param $table
     */
    public function __construct($table)
    {
        $this->table = $table;
        $this->query = "CREATE TABLE " . $table . " (";
    }

    /**
     * @param $fieldname
     * @param $size
     */
    public function varchar($fieldname, $size)
    {
        $this->query .= $fieldname . " VARCHAR (" . $size . ") ,";
    }

    /**
     * @param $fieldname
     * @param null $size
     */
    public function text($fieldname, $size = null)
    {
        if ($size != null) {
            $this->query .= $fieldname . " TEXT (" . $size . ") ,";
        } else {
            $this->query .= $fieldname . " TEXT ,";
        }
    }

    /**
     * @param $fieldname
     * @param $size
     * @return string
     */
    public function integer($fieldname, $size)
    {
        return $this->query .= $fieldname . " INT(" . $size . ") ,";
    }

    /**
     * @param $fieldname
     * @return string
     */
    public function double($fieldname)
    {
        return $this->query .= $fieldname . " DOUBLE  ,";
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        $this->query = trim($this->query, ",") . ");";
        return $this->query;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param $fieldname
     * @param $timestamp
     * @return string
     */
    public function timestamp($fieldname, $timestamp)
    {
        return $this->query .= "$fieldname timestamp DEFAULT current_timestamp,";
//        return $this->query .=$fieldname." TIMESTAMP DEFAULT '".$timestamp."',";

    }

    /**
     * @param $fieldname
     * @return string
     */
    public function date($fieldname)
    {
        return $this->query .= $fieldname . " DATE ,";
    }

    /**
     * @param $fieldname
     * @return string
     */
    public function time($fieldname)
    {
        return $this->query .= $fieldname . " TIME ,";
    }

    /**
     * @return string
     */
    public function increments()
    {
        return $this->query .= "id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,";
    }

    /**
     * @return string
     */
    public function timestamps()
    {
        return $this->query .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,";
    }
}