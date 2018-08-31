<?php 
namespace App\Migrations;

use Core\Database\SchemaBuilder\Schema;

class payroll{


 public static function run($tablename)
 {
    $table = new Schema($tablename);
    $table->increments();
    $table->integer('employee_id',11);
    $table->double('amount');
    $table->double('deductions');
    $table->integer('year',11);
    $table->varchar('month',15);
    $table->timestamps();
    $table->build();
 }
}