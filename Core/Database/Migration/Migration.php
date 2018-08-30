<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/9/2018
  
 * Time: 12:08 PM
 */

namespace Core\Database\Migration;

/**
 * Get all the required classes and resources
 */
use Core\App\Bootstrap\App;
use Core\Exceptions\ExceptionsHandler;

/**
 * Class Migration
 * @package Core\Database\Migration
 * Creates a migration/ table structure and allows you to run them.
 * Migrations created are stored as individual classes and enables easy exportation to other systems
 */
class Migration
{
    /**
     * @var string
     */
    protected static $dir = 'Database/Migrations/';
    /**
     * @var
     */
    protected static $root;
    /**
     * @var
     */
    protected static $migration;

    //locate all the migrations

    /**
     * @return array
     * @throws ExceptionsHandler
     * Look for the migrations in the migrations directory if the directory exists
     */
    public static function find()
    {
        self::$root = App::getDocumentRoot();
        if (is_dir(self::$root . self::$dir)) {
            $list = array_diff(scandir(self::$root . self::$dir), array('..', '.'));
            return $list;
        }
        throw new ExceptionsHandler('Migrations Directory not found');
    }

    /**
     * Get the list of all existing migrations and load them.
     * Place them in an array that is going to be executed
     */
    public static function load()
    {
        try {
            foreach (self::find() as $item) {
                if (is_file(self::$root . self::$dir . $item)) { // Ensure that each of the items from the list is indeed a file
                    if (pathinfo(self::$root . self::$dir . $item, PATHINFO_EXTENSION) == 'php') { // Ensure that the files are php files
                        $name = pathinfo(self::$root . self::$dir . $item, PATHINFO_FILENAME); // Get the file name
                        @require self::$root . self::$dir . $item; // Load the file
                        $string = 'App\Migrations'; // Add the namespace to which they exist in
                        $name = '\\' . $name; // Add the class name
                        self::$migration[$string . $name] = $name; // Add the files to be executed into an array with the index being the namespace and class name
                    }
                }
            }
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }

    /**
     *
     */
    public static function run()
    {
        // Load all the migrations
        self::load();
        // Loop through the migration executing them
        foreach (self::$migration as $item => $value) {
            $item::run(stripslashes($value)); // Load the migration class and execute it's run function
        }
    }

    /**
     * @param $name
     * This is used to generate the migrations using a default syntax and functions.
     * It includes an autoincrement field generator and timestamp generator
     */
    public static function make($name)
    {
        try { // Load the list of all migrations that exists and check if the migration we are trying to create already exists
            if (!in_array($name . '.php', self::find())) {
                if ($migration = fopen(self::$root . self::$dir . $name . '.php', 'w')) { //create a new empty migration file with the name specified
                    fwrite($migration, // write the default migration with the class name being the name of the migration we are creating
                        '<?php ' . PHP_EOL .
                        'namespace App\Migrations;' . PHP_EOL . PHP_EOL .
                        'use Core\Database\SchemaBuilder\Schema;' . PHP_EOL . PHP_EOL .
                        'class ' . $name . '{' . PHP_EOL . PHP_EOL . PHP_EOL .
                        ' public static function run($tablename)' . PHP_EOL . ' {' . PHP_EOL . '    $table = new Schema($tablename);' . PHP_EOL . '    $table->increments();' . PHP_EOL . '    $table->build();' . PHP_EOL . ' }' . PHP_EOL . '}'
                    );
                    fclose($migration); // Close the file and save it
                    echo "Migration '$name' has been successfully created." . PHP_EOL; // Success message
                }
            } else {
                die('Table already exists');
            }
        } catch (ExceptionsHandler $e) {
            dd($e);
        }
    }
}