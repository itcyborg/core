<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/16/2018
 * Time: 12:09 PM
 */

namespace Core\Requests;


class SanitizeRequest
{
    public static function email($email)
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function text($text)
    {
        return filter_var($text, FILTER_SANITIZE_STRING);
    }

    public static function url($url)
    {
        return filter_var($url, FILTER_SANITIZE_URL);
    }
}