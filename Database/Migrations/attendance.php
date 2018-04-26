<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 12:35 PM
 */

namespace App\Migrations;


use Core\Database\SchemaBuilder\Schema;

class attendance
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('employeeID', 11);
        $table->date('date');
        $table->time('CheckIn');
        $table->time('CheckOut');
        $table->timestamps();
        $table->build();
    }
}