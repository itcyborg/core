<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class loans
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('memberid', 11);
        $table->double('amount');
        $table->date('issued_on');
        $table->double('rate');
        $table->date('dueDate');
        $table->timestamps();
        $table->build();
    }
}