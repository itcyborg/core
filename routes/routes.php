<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 9:56 AM
 */

use Core\Router\Route;


(new Core\Auth\Auth)->Routes();
Route::get('', 'indexController@index');

//Customer Relation Routes
Route::get('crm','crmController@index');
Route::get('crm/customers','crmController@listCustomers');
Route::get('crm/customer/add','crmController@add');
//Route::get('crm/customer/edit/customer/{id}','crmController@edit');
//Route::get('crm/customer/edit/contact/{id}','crmController@editContact');

Route::post('crm/customer/add','crmController@store');
Route::post('crm/customers/delete/{id}','crmController@delete');
Route::post('crm/customer/update','crmController@update');
Route::post('crm/customer/update/contact','crmController@updateContact');
Route::post('crm/customer/contact/add','crmController@addContact');

//Case Management
Route::get('case','caseController@index');
Route::get('case/new','caseController@new');
Route::get('case/list','caseController@list');
Route::get('case/edit/{id}','caseController@edit');
Route::get('case/reports','caseController@reports');

Route::post('case/delete','caseController@delete');
Route::post('case/new','caseController@add');
Route::post('case/edit','caseController@update');
Route::post('case/solve','caseController@solve');

//Human Resource
Route::get('hr','hrController@index');

Route::get("hr/employee/add",'hrController@employeeForm');
Route::get("hr/employee/view",'hrController@listEmployees');
Route::post("hr/employee/add",'hrController@addEmployee');

Route::get('hr/payroll','payrollController@index');
Route::get('hr/payroll/all','payrollController@all');
Route::get('hr/payroll/payslips','payrollController@payslips');
Route::get('hr/payroll/list/{month}/{year}','payrollController@list');
Route::get('hr/payroll/process','payrollController@processIndex');

Route::post('hr/payroll/process','payrollController@process');
Route::post('hr/payroll/process/all','payrollController@processall');
Route::post("hr/payroll/add",'payrollController@add');

Route::get('hr/recruitment','recruitmentController@index');
Route::get('hr/recruitment/all','recruitmentController@all');
Route::get('hr/recruitment/adverts/list','recruitmentController@listAdverts');
Route::get('hr/recruitment/applications/list','recruitmentController@listApplications');
Route::get('hr/recruitment/applications/new','recruitmentController@newApplication');

Route::post('hr/recruitment/adverts/new','recruitmentController@newAdvert');
Route::post('/hr/recruitment/applications/new','recruitmentController@apply');

Route::get('sales','salesController@index');
Route::get('sales/stock','salesController@stock');
Route::get('sales/addstock','salesController@addstock');
Route::get('sales/order','salesController@order');
Route::get('sales/placeorder','salesController@placeorder');
Route::get('sales/genledger','salesController@genledger');

Route::post('sales/stock/add','salesController@add');
Route::post('sales/stock/addorder','salesController@addorder');
Route::post('sales/stock/deletestock','salesController@deletestock');

Route::get('starter','indexController@starter');
Route::get('email',function($i){
//    $password=new \Core\Auth\PasswordService();
//    dd($password->hash('rael'));
});
