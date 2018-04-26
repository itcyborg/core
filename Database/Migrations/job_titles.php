<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class job_titles
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->varchar('job_titles', 128);
        $table->timestamps();
        $table->build();
    }
}