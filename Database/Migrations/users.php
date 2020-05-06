<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class users{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
    $table->varchar('username',64);
    $table->varchar('email',50);
    $table->varchar('password',128);
    $table->timestamps();
    $table->build();
 }
}