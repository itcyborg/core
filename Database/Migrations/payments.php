<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class payments
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('employee_id', 11);
        $table->double('amount');
        $table->text('reason');
        $table->timestamps();
        $table->build();
    }
}