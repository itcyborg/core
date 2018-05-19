<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class sacco_payments{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
    $table->integer('memberid',11);
    $table->double('amount');
    $table->date('paidOn');
    $table->integer('loanId',11);
    $table->timestamps();
    $table->build();
 }
}