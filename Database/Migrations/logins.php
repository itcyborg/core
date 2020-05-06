<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class logins{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
    $table->integer('user_id',6);
    $table->timestamps();
    $table->build();
 }
}