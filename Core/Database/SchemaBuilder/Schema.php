<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/8/2018
 * Time: 7:09 PM
 */

namespace Core\Database\SchemaBuilder;


use Core\Database\ConnectionBuilder\Connection;

class Schema extends SchemaBuilder
{
    public function build()
    {
        try {
            Connection::connection()->exec($this->getQuery());
            print "Table '" . $this->getTable() . "' migrated successfully.";
            echo PHP_EOL;
        } catch (\Exception $e) {
            if ($e->getCode() === '42S01') {
                print trim(explode(':', $e->getMessage())[2]);
                echo PHP_EOL;
            } else {
                print trim($e->getMessage());
            }
        }
    }
}