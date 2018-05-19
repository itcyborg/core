<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class transactions{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
    $table->integer('refNo',11);
    $table->text('description');
    $table->double('value');
    $table->date('dateOfTransaction');
    $table->integer('type',2);
    $table->timestamps();
    $table->build();
 }
}