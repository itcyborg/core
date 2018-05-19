<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class feedback
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('refNo', 11);
        $table->varchar('title', 512);
        $table->date('comments');
        $table->timestamps();
        $table->build();
    }
}