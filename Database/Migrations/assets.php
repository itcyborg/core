<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class assets{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
    $table->text('assetName');
    $table->text('description');
    $table->double('value');
    $table->integer('status',2);
    $table->timestamps();
    $table->build();
 }
}