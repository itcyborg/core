<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class order{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
     $table->integer('orderId', 11);
     $table->integer('amount', 11);
     $table->varchar('status',64);
     $table->varchar('order_Item',64);
     $table->timestamps();
     $table->build();
 }
}