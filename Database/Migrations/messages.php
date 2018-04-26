<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class messages
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('from_user', 11);
        $table->integer('to_user', 11);
        $table->text('message');
        $table->integer('status', 2);
        $table->timestamp('sent_at', 'current_timestamp');
        $table->timestamps();
        $table->build();
    }
}