<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class orders
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('memberId', 11);
        $table->double('amount');
        $table->date('paidOn');
        $table->integer('loanId', 11);
        $table->timestamps();
        $table->build();
    }
}