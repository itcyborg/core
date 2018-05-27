<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 5:29 PM
 */

namespace Core\Database\DB;

/**
 * Get the resources
 */
use Database\QueryBuilder\QueryBuilder;

/**
 * Class DB
 * @package Core\Database\DB
 * Interface with the query builder and execute the queries using this.
 * Allows you to use DB::all() instead of QueryBuilder::all()
 */
class DB extends QueryBuilder
{

}