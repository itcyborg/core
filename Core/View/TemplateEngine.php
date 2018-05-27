<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/8/2018
 * Time: 11:43 AM
 */

namespace Core\View;

/**
 * Class TemplateEngine
 * @package Core\View
 */
class TemplateEngine
{
    /**
     * @var
     */
    public static $vars;

    /**
     * @param $key
     * @param $value
     */

    ## view('viewname',['key'=>'value'])
    /**
     * @param $key
     * @param $value
     */
    public static function assign($key, $value)
    {
        self::$vars[$key] = $value;
    }

    /**
     * @param $content
     * @return null|string|string[]
     */
    public static function render($content)
    {
        $content = self::parse($content);
        eval(' ?>' . $content . '<?php ');
        return $content;
    }

    /**
     * @param $content
     * @return null|string|string[]
     */
    public static function parse($content)
    {
        foreach (self::$vars as $key => $value) {
            $content = preg_replace('/\{{\$' . $key . '\}}/', $value, $content);
            $content = preg_replace('/\{{' . $key . '\}}/', $value, $content);
            $content = preg_replace('/\{' . $key . '\}/', $value, $content);
            $content = preg_replace('/\[' . $key . '\]/', $value, $content);
            $content = preg_replace('/\{{asset(.*)\}}/', '<?php asset($1) ?>', $content);
            $content = preg_replace('/\{asset(.*)\}/', '<?php asset($1) ?>', $content);
            $content = preg_replace('/\@asset(.*)\@/', '<?php asset($1) ?>', $content);
        }
        return $content;
    }
}