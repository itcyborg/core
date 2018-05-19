<?php

use Core\View\View;

/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 1:45 PM
 * @param $var
 */

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

function dump($var)
{
    echo "<pre><code>";
    var_dump($var);
    echo "</code></pre>";
}

function toJson($data)
{
    return json_encode($data, true);
}

function asset($asset)
{
    echo \Core\Asset\AssetLoader::load($asset);
}

function view($view, $data = null)
{
    try {
        return View::loadView($view, $data);
    } catch (\Core\Exceptions\ExceptionsHandler $e) {
        dd($e);
    }
}