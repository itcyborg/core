<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class sales
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('item_id', 11);
        $table->varchar('item_name',11);
        $table->double('cost');
        $table->varchar('status','11');
        $table->date('arrival_date');
        $table->timestamps();
        $table->build();
    }
}