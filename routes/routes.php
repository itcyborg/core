<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 9:56 AM
 */

use Core\Auth\Auth;
use Core\Database\DB\DB;
use Core\Router\Route;


(new Core\Auth\Auth)->Routes();
Route::get('', 'indexController@index');

//Customer Relation Routes
Route::get('crm','crmController@index');
Route::get('crm/customers','crmController@listCustomers');
Route::get('crm/customer/add','crmController@add');
Route::get('crm/customer/edit/customer/{id}','crmController@edit');
Route::get('crm/customer/edit/contact/{id}','crmController@editContact');

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
Route::get('hr/list','hrController@list');

Route::get('hr/payroll','payrollController@index');
Route::get('hr/payroll/all','payrollController@all');
Route::get('hr/payroll/list/{month}/{year}','payrollController@list');

Route::post('hr/payroll/process','payrollController@process');

Route::get('hr/recruitment','recruitmentController@index');
Route::get('hr/recruitment/all','recruitmentController@all');
Route::get('hr/recruitment/adverts/list','recruitmentController@listAdverts');
Route::get('hr/recruitment/applications/list','recruitmentController@listApplications');
Route::get('hr/recruitment/applications/new','recruitmentController@newApplication');

Route::post('hr/recruitment/adverts/new','recruitmentController@newAdvert');
Route::post('/hr/recruitment/applications/new','recruitmentController@apply');

Route::get('starter','indexController@starter');
Route::get('email/test',function($i){
    echo 'hello';
});
