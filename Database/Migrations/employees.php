<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class employees
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->varchar('first_name', 64);
        $table->varchar('last_name', 64);
        $table->varchar('surname', 64);
        $table->date('dateOfBirth');
        $table->integer('idno', 11);
        $table->integer('jobTitle', 11);
        $table->timestamps();
        $table->build();
    }
}