<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 9:56 AM
 */

use Core\Auth\Auth;
use Core\Router\Route;

Auth::Routes();
Route::get('', 'AboutController@hello');
Route::get('hello/{id}', function ($id) {
    echo $id;
});
Route::get('test', 'AboutController@download');
Route::get('help/{id}/{page}', 'AboutController@help');

Route::post('file', 'AboutController@file');
Route::get('index', 'IndexController@index');