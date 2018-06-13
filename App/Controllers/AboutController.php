<?php

use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;
use Core\Requests\Request;
use Core\Storage\Storage;

/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/15/2018
 * Time: 2:43 PM
 */

class AboutController
{
    public function __construct()
    {
    }

    public function hello()
    {
        dd(\Core\Database\Migration\Migration::load());
        //dd(\PHPMailer\PHPMailer\PHPMailer::$validator);
        dd(DB::all('users'));
    }

    public function index()
    {
        echo "ondec ";
    }

    public function help()
    {
        echo "help";
    }

    public function file()
    {
        $request = new Request();
        $f = $request->files('file', 'file1');
        try {
            $storage = new Storage();
            dd($storage->store($f->file, 'private'));
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }

    public static function download()
    {
        $file = 'Storage/Public/mn9h85ySdY5Iki6.mp3';
        try {
            Storage::download($file, 'music');
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }
}