<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 2:06 PM
 */

namespace App\Migrations;


use Core\Database\SchemaBuilder\Schema;

class customer
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->varchar('first_name', 64);
        $table->varchar('last_name', 64);
        $table->varchar('middle_name', 64);
        $table->varchar('email', 128);
        $table->timestamp('created_at', 'current_timestamp()');
        $table->build();
    }
}