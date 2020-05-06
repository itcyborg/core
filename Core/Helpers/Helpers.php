<?php

use Core\Exceptions\ExceptionsHandler;
use Core\URL\URL;
use Core\View\View;

/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 1:45 PM
 */

/**
 * @param $var
 */
function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

/**
 * @param $var
 */
function dump($var)
{
    echo "<pre><code>";
    var_dump($var);
    echo "</code></pre>";
}

/**
 * @param $data
 * @return string
 */
function toJson($data)
{
    return json_encode($data, true);
}

/**
 * @param $asset
 */
function asset($asset)
{

    if (isset($_SERVER['HTTPS'])) {
        echo 'https://'.URL::getBase().'/'.\Core\Asset\AssetLoader::load($asset);
    }else{
        echo 'http://'.URL::getBase().'/'.\Core\Asset\AssetLoader::load($asset);
    }
}

/**
 * @param $view
 * @param null $data
 */
function view($view, $data = null)
{
    try {
        if($data==null){
            $data=[];
        }
        return View::loadView($view, $data);
    } catch (\Core\Exceptions\ExceptionsHandler $e) {
        dd($e);
    }
}

function url($uri)
{
    echo \Core\URL\URL::getURI($uri);
}

function str_random($length=null,bool $secure=false){
    $str_length=8;
    ($length>0)? $str_length=$length:$str_length=$str_length;
    $random_string=openssl_random_pseudo_bytes($str_length,$secure);
    return str_shuffle(bin2hex($random_string));
}

function toObject($array){
    return json_decode(json_encode($array));
}