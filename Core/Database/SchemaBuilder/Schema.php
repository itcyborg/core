<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/8/2018
 * Time: 7:09 PM
 */

namespace Core\Database\SchemaBuilder;

use Core\Database\ConnectionBuilder\Connection;

/**
 * Class Schema
 * @package Core\Database\SchemaBuilder
 */
class Schema extends SchemaBuilder
{
    /**
     * Build a schema for migration
     */
    public function build()
    {
        try {
            Connection::connection()->exec($this->getQuery()); // get the connection to the database and execute the migration
            print "Table '" . $this->getTable() . "' migrated successfully."; // Migration successful
            echo PHP_EOL; // print a line break
        } catch (\Exception $e) {
            if ($e->getCode() === '42S01') { // if a migration/ table already exists
                print trim(explode(':', $e->getMessage())[2]); // Tell the user
                echo PHP_EOL; // print a line break
            } else {
                print trim($e->getMessage()); // remove extra white spaces
            }
        }
    }
}