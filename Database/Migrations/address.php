<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 12:35 PM
 */

namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

/**
 * Class address
 * @package App\Migrations
 */
class address
{
    /**
     * @param $tablename
     */
    public static function run($tablename)
    {
        $table = new Schema($tablename);
        $table->increments();
        $table->integer('customer_id', 11);
        $table->text('address');
        $table->text('address_alt');
        $table->timestamps();
        $table->build();
    }
}