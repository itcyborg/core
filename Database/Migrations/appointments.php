<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 12:35 PM
 */

namespace App\Migrations;


use Core\Database\SchemaBuilder\Schema;

class appointments
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('customerID', 11);
        $table->date('date');
        $table->time('time');
        $table->varchar('agenda', 256);
        $table->varchar('note', 128);
        $table->varchar('attendees', 256);
        $table->timestamps();
        $table->build();
    }
}