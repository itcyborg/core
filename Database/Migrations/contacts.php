<?php

namespace App\Migrations;

use Core\Database\Migration\BluePrint;
use Core\Database\SchemaBuilder\Schema;

class contacts extends BluePrint
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('custID', 11);
        $table->integer('phone', 11);
        $table->integer('alt_phone', 11);
        $table->timestamps();
        $table->build();
    }
}