<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/12/2018
 * Time: 9:31 PM
 */

namespace Core\Database\ConnectionBuilder;

class Connection extends \Database\ConnectionBuilder\ConnectionBuilder
{
    public static function connection()
    {
        return ConnectionBuilder::getConnection();
    }
}