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
use Latte\Engine;

/**
 * Class View
 * @package Core\View
 */
class View
{
    /**
     * @param $view
     * @param null $data
     * @throws ExceptionsHandler
     */
    public static function loadView($view, $data = null)
    {
        if (is_readable(App::viewsDir() . $view)) {
            $latte=new Engine;
            $latte->render(App::viewsDir() . $view,$data);
//            $contents = file_get_contents(App::viewsDir() . $view);
//            if ($data !== null) {
//                foreach ($data as $datum => $item) {
//                    TemplateEngine::assign($datum, $item);
//                }
//            }
        } else {
            throw new ExceptionsHandler('View not found');
        }
//        self::render($contents);
    }

    /**
     * @param $content
     */
    public static function render($content)
    {
        TemplateEngine::render($content);
    }
}