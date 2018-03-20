<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 9:56 AM
 */

use Core\Router\Route;

Route::get('', 'AboutController@hello');
Route::get('hello/{1}', 'AboutController@index');
Route::get('help', 'AboutController@help');