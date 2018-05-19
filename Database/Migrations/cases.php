<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 12:35 PM
 */

namespace App\Migrations;


use Core\Database\SchemaBuilder\Schema;

class cases
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('customerId', 11);
        $table->varchar('issue', 24);
        $table->integer('status', 2);
        $table->integer('solved_by', 11);
        $table->timestamps();
        $table->build();
    }
}