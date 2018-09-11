<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class payslips{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
    $table->integer('employee_id',11);
    $table->double('amount');
    $table->double('tax');
    $table->double('deductions');
    $table->double('net');
    $table->integer('year',5);
    $table->varchar('month',20);
    $table->timestamps();
    $table->build();
 }
}