<?php

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

/**
 * Class allowance
 * @package App\Migrations
 */
class allowance
{


    /**
     * @param $tablename
     */
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('employee_id', 11);
        $table->text('allowances', 1024);
        $table->double('total_amount');
        $table->integer('byUser', 11);
        $table->timestamps();
        $table->build();
    }
}