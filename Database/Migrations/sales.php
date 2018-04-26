<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class sales
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('stockid', 11);
        $table->double('cost');
        $table->date('arrival_date');
        $table->timestamps();
        $table->build();
    }
}