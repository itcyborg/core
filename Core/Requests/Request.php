<?php
/**
 * Created by PhpStorm.
 * User: itcyborg
 * Date: 3/13/2018
 * Time: 11:25 AM
 */

namespace Core\Requests;


use Core\Exceptions\ExceptionsHandler;

/**
 * Class Request
 * @package Core\Requests
 */
class Request
{
    /**
     * @var object
     */
    public $request;
    /**
     * @var string
     */
    private static $previous = '/';
    /**
     * @var
     */
    private static $file;
    /**
     * @var array
     */
    private static $files = array();

    /**
     * Request constructor.
     */
    public function __construct()
    {
        //handle files requests
        if (isset($_FILES)) {
            if (sizeof($_FILES) > 1) {
                self::setFiles($_FILES);
            } elseif (sizeof($_FILES) > 0) {
                self::setFile($_FILES);
            }
        }
        $this->request = (object)$this->request;
    }

    //get the request uri

    /**
     * @return string
     */
    public static function uri()
    {
        //remove the trailing / if any
        $uri = trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            "/"
        );

        //set where we came  from
        if (isset($_SERVER['HTTP_REFERER'])) {
            self::setPrevious($_SERVER['HTTP_REFERER']);
        }
        return $uri;
    }

    /**
     * @return mixed
     */
    public static function getPrevious()
    {
        return self::$previous;
    }

    /**
     * @param mixed $previous
     */
    public static function setPrevious($previous)
    {
        self::$previous = $previous;
    }

    /**
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        /*
         * handle file uploaded
         * use file('fieldname') to get the file uploaded that is contained in the said field
         * * above returns an object that has only the fileattributes that is : name, size, tmp_name, type, size, errors
         * use files('fieldname','fieldname2',...) to get the files uploaded that is contained in the said fields
         * above returns an object that has fieldname->fileattributes
        */
        if ($name === 'file') {
            if (isset($_FILES)) {
                foreach ($_FILES as $index => $FILE) {
                    if ($index === $arguments[0]) {
                        return json_decode(json_encode($FILE));
                    }
                }
            }
        }

        if ($name === 'files') {
            foreach ($_FILES as $index => $FILE) {
                if (is_array($arguments)) {
                    foreach ($arguments as $argument) {
                        if ($argument == $index) {
                            $tmp[$index] = $FILE;
                            $data = json_decode(json_encode($tmp));
                        }
                    }
                }
            }
            return $data;
        }
    }

    /**
     * @param $name
     * @return mixed
     * @throws ExceptionsHandler
     */
    public function __get($name)
    {
        /**
         * get the post/get field and data
         */
        $tmp = null;
        #get the $_GET request data
        if (isset($_GET)) {
            foreach ($_GET as $index => $item) {
                if ($index == $name) {
                    $tmp = $item;
                }
            }
        }

        #get the $_POST request data
        if (isset($_POST)) {
            foreach ($_POST as $index => $item) {
                if ($index == $name) {
                    $tmp = $item;
                }
            }
        }

        return $tmp;
    }
}