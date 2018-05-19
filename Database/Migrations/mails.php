<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 12:35 PM
 */

namespace App\Migrations;


use Core\Database\SchemaBuilder\Schema;

class mails
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('receiver', 11);
        $table->integer('sender', 11);
        $table->varchar('message', 2048);
        $table->timestamp('sent_at', 'current_timestamp');
        $table->integer('status', 2);
        $table->build();
    }
}