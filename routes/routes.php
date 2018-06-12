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


Auth::Routes();
Route::get('', 'indexController@index');

//Customer Relation Routes
Route::get('crm','crmController@index');
Route::get('crm/customers','crmController@listCustomers');
Route::get('crm/customer/add','crmController@add');

Route::post('crm/customer/add','crmController@store');
Route::post('crm/customer/delete','crmController@delete');
Route::post('crm/customer/update','crmController@update');
Route::post('crm/customer/contact/add','crmController@addContact');

//Case Management
Route::get('case','caseController@index');
Route::get('case/new','caseController@new');
Route::get('case/edit/{id}','caseController@edit');
Route::get('case/reports','caseController@reports');

Route::post('case/delete','caseController@delete');
Route::post('case/new','caseController@add');
Route::post('case/edit','caseController@update');
Route::post('case/solve','caseController@solve');

//Human Resource
Route::get('hr','hrController@index');
Route::get('hr/list','hrController@');



Route::get('starter','indexController@starter');