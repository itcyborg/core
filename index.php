<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 9:43 AM
 */

/**
 * Autoload all the classes
 */
require 'vendor\autoload.php';

/**
 * Load the App class to boot up the application
 */

use Core\App\Bootstrap\App;

/**
 * Set our point of entry to be private/development
 */
App::setPublic(false);
/**
 * Boot and run the application
 * Set the root directory
 */
App::boot(__DIR__);
