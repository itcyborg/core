<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
 * Time: 12:08 PM
 */

namespace Core\Database\Migration;


use Core\App\Bootstrap\App;
use Core\Exceptions\ExceptionsHandler;

class Migration
{
    protected static $dir = 'Database/Migrations/';
    protected static $root;
    protected static $migration;

    //locate all the migrations
    public static function find()
    {
        self::$root = App::getDocumentRoot();
        if (is_dir(self::$root . self::$dir)) {
            $list = array_diff(scandir(self::$root . self::$dir), array('..', '.'));
            return $list;
        }
        throw new ExceptionsHandler('Migrations Directory not found');
    }

    //load all the migrations
    public static function load()
    {
        try {
//            dd(self::find());
            foreach (self::find() as $item) {
                if (is_file(self::$root . self::$dir . $item)) {
                    if (pathinfo(self::$root . self::$dir . $item, PATHINFO_EXTENSION) == 'php') {
                        $name = pathinfo(self::$root . self::$dir . $item, PATHINFO_FILENAME);
                        @require self::$root . self::$dir . $item;
                        $string = 'App\Migrations';
                        $name = '\\' . $name;
                        self::$migration[$string . $name]['run'] = $name;
                    }
                }
            }
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }

    //execute all the migrations
    public static function run()
    {
        self::load();
        foreach (self::$migration as $item => $value) {
            $item::run(stripslashes($value['run']));
        }
    }

    public static function make($name)
    {
        try {
            if (!in_array($name . '.php', self::find())) {
                if ($migration = fopen(self::$root . self::$dir . $name . '.php', 'w')) {
                    fwrite($migration,
                        '<?php ' . PHP_EOL .
                        'namespace App\Migrations;' . PHP_EOL . PHP_EOL .
                        'use Core\Database\SchemaBuilder\Schema;' . PHP_EOL . PHP_EOL .
                        'class ' . $name . '{' . PHP_EOL . PHP_EOL . PHP_EOL .
                        ' public static function run($tablename)' . PHP_EOL . ' {' . PHP_EOL . '    $table = new Schema($tablename);' . PHP_EOL . '    $table->increments();' . PHP_EOL . '    $table->build();' . PHP_EOL . ' }' . PHP_EOL . '}'
                    );
                    fclose($migration);
                    echo "Migration '$name' has been successfully created." . PHP_EOL;
                }
            } else {
                die('Table already exists');
            }
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }
}