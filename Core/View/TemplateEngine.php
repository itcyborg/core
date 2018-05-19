<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/8/2018
 * Time: 11:43 AM
 */

namespace Core\View;

class TemplateEngine
{
    public static $vars;

    /**
     * @param mixed $vars
     */

    ## view('viewname',['key'=>'value'])
    public static function assign($key, $value)
    {
        self::$vars[$key] = $value;
    }

    public static function render($content)
    {
        $content = self::parse($content);
        eval(' ?>' . $content . '<?php ');
        return $content;
    }

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