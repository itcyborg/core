<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/16/2018
 * Time: 12:09 PM
 */

namespace Core\Requests;

use Core\Exceptions\ExceptionsHandler;


/** Class to Clean the inputs by removing unwanted characters and validating that they meet the requirements of the input type
 * Class SanitizeRequest
 * @package Core\Requests
 */
class SanitizeRequest
{
    /** Sanitize and validate user email
     * @param $email
     * @return mixed
     * @throws ExceptionsHandler
     */
    public static function email($email)
    {
        if(trim($email)==""){
            throw new ExceptionsHandler('Empty value passed');
        }
        return filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
    }

    /** Sanitize user text. Removing unwanted characters
     * @param $text
     * @return mixed
     * @throws ExceptionsHandler
     */
    public static function text($text)
    {
        if(trim($text)==""){
            throw new ExceptionsHandler('Empty value passed');
        }
        return filter_var($text, FILTER_SANITIZE_STRING);
    }

    /**
     * Sanitize and validate uri.
     * @param $url
     * @return mixed valid=mixed | false/null
     * @throws ExceptionsHandler
     */
    public static function url($url)
    {
        if(trim($url)==""){
            throw new ExceptionsHandler('Empty value passed');
        }
        return filter_var(filter_var($url, FILTER_SANITIZE_URL), FILTER_VALIDATE_URL);
    }
}