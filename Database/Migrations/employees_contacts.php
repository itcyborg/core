<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class employees_contacts
{


    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('employeeid', 11);
        $table->text('address', 128);
        $table->text('address_alt', 128);
        $table->varchar('email', 128);
        $table->integer('contact', 11);
        $table->integer('contact_alt', 11);
        $table->timestamps();
        $table->build();
    }
}