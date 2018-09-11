<?php
/**
 * Created by PhpStorm.
 * User: Rachael Kathini
 * Date: 9/10/2018
 * Time: 4:56 PM
 */
namespace App\Migrations;


use Core\Database\SchemaBuilder\Schema;

class genledger
{
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('asset_id', 20);
        $table->varchar('asset_name', 64);
        $table->varchar('asset_value', 64);
        $table->varchar('year', 10);
        $table->timestamp('created_at', 'current_timestamp()');
        $table->build();
    }
}