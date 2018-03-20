<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 1:45 PM
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