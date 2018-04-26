<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class contribution
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('member_id', 11);
        $table->double('amount');
        $table->date('contribution_date');
        $table->timestamps();
        $table->build();
    }
}