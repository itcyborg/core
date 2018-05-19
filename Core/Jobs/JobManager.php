<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/19/2018
 * Time: 5:11 PM
 */

namespace Core\Jobs;


use Core\App\Bootstrap\App;

class JobManager
{
    public const JOB_DIR = 'Jobs/';

    public static function make($name)
    {
        self::list();
    }

    public static function list()
    {
        $jobroot = App::$document_root . self::JOB_DIR;
        $list = scandir($jobroot);
        $list = array_diff($list, ['.', '..']);
        $nlist = null;
        foreach ($list as $item) {
            if (pathinfo($item, PATHINFO_EXTENSION) === 'php') {
                $nlist[] = pathinfo($item, PATHINFO_FILENAME);
            }
        }
        dd($nlist);
    }
}