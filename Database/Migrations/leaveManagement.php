<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 12:35 PM
 */

namespace App\Migrations;


use Core\Database\SchemaBuilder\Schema;

class leaveManagement
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('employeeID', 11);
        $table->date('fromdate');
        $table->date('todate');
        $table->varchar('reason', 256);
        $table->varchar('notes', 256);
        $table->timestamps();
        $table->build();
    }
}