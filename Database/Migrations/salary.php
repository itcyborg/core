<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 12:35 PM
 */

namespace App\Migrations;


use Core\Database\SchemaBuilder\Schema;

class salary
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('job_group', 11);
        $table->integer('salaries', 11);
        $table->integer('tax', 11);
        $table->timestamps();
        $table->build();
    }
}