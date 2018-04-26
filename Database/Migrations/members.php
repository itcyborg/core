<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class members
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('employee_id', 11);
        $table->integer('memberType', 11);
        $table->date('joinedOn');
        $table->timestamps();
        $table->build();
    }
}