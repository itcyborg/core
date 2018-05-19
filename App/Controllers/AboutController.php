<?php

use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;
use Core\Notifications\Notifications;
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
        dd(DB::add('users', ['name', 'email', 'password'], ['lkld', 'fsddf', 'asdaad']));
        preg_match('/\(.*\)/', php_uname(), $match);
        dd($match);
//        $job=new Job();
//        $job->delete('test');
//        $res=$job->create('test',1,\Core\App\Bootstrap\App::getDocumentRoot().'/imap.bat');
//        dd($res);
        Notifications::add(1, 'well done');
        Notifications::getNotifications('1');
        dd(session_id());
//        $config=new Config;
//        dd($config->database());
//        dd(Config::database());
//        dd(DB::all('users'));
//        try {
//            dd((new Core\Auth\PasswordService)->hasInteger('sdas'));
//        } catch (Exception $e) {
//            dd($e);
//        }
//        view('test.html', ['id' => 1,'name'=>'isaac']);
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