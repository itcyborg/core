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
Route::get(/**
 * @param $id
 */
    'hello/{id}',
    function ($id) {
//        echo $id;
        dd(DB::all('users'));
    }
);
Route::get('test', 'AboutController@download');
Route::get('help/{id}/{page}', 'AboutController@help');

Route::post('file', 'AboutController@file');
Route::get('index', 'IndexController@index');