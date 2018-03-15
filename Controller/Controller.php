<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 2:08 PM
 */

namespace Controller;


class Controller
{
    public function __construct($controller, $action = null)
    {
        if ($action !== null) {
            $controller = self::loadController($controller);
            $controller->self::loadAction($action);
        }
    }

    public static function loadController($controller, $action = null)
    {
        return new $controller;
    }

    public static function loadAction($action)
    {

    }
}