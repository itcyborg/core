<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/8/2018
 * Time: 11:50 AM
 */

namespace Core\View;


use Core\App\Bootstrap\App;
use Core\Exceptions\ExceptionsHandler;

class View
{
    public static function loadView($view, $data = null)
    {
        if (is_readable(App::viewsDir() . $view)) {
            $contents = file_get_contents(App::viewsDir() . $view);
            if ($data !== null) {
                foreach ($data as $datum => $item) {
                    TemplateEngine::assign($datum, $item);
                }
            }
        } else {
            throw new ExceptionsHandler('View not found');
        }
        self::render($contents);
    }

    public static function render($content)
    {
        TemplateEngine::render($content);
    }
}