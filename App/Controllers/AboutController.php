<?php

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
        echo "<form action='file' method='post' enctype='multipart/form-data'>
<input type='text' name='file' value='hello'>
    <input type='file' name='file'><br>
    <input type='file' name='file1'><br>
    <button>Submit</button>
</form>";
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
            dd($storage->put($f->file));
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }
}