<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 3/22/2018
 * Time: 8:43 PM
 */

namespace Core\Router;

class RoutePattern
{
    public static function getRegex($pattern)
    {
        if (preg_match('/[^-:\/_{}()a-zA-Z\d]/', $pattern))
            return false;

        // Turn "(/)" into "/?"
        $pattern = preg_replace('#\(/\)#', '/?', $pattern);
        // Create capture group for ":parameter"
        $allowedParamChars = '[a-zA-Z0-9\_\-]+';
        $pattern = preg_replace(
            '/:(' . $allowedParamChars . ')/',   # Replace ":parameter"
            '(?<$1>' . $allowedParamChars . ')', # with (?<parameter>[a-zA-Z0-9\_\-]+)"
            $pattern
        );

        // Create capture group for '{parameter}'
        $pattern = preg_replace(
            '/{(' . $allowedParamChars . ')}/',    # Replace "{parameter}"
            '(?<$1>' . $allowedParamChars . ')', # with " ?<parameter>[a-zA-Z0-9\_\-]+)"
            $pattern
        );

        // Add start and end matching
        $patternAsRegex = "@^" . $pattern . "$@D";

        return $patternAsRegex;
    }

    public static function getParams($pattern, $uri)
    {
        if ($ok = preg_match($pattern, $uri, $matches)) {
            $params = array_intersect_key(
                $matches,
                array_flip(array_filter(array_keys($matches), 'is_string'))
            );
            list($key, $value) = each($params);
            $params[$key] = $value;
            return $params;
        } else {
            return false;
        }
    }
}