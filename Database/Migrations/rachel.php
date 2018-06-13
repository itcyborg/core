<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class rachel{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
    $table->build();
 }
}