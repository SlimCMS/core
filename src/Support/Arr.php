<?php

declare(strict_types=1);

namespace Slimcms\Support;

class Arr
{
    /**
     * @param string|array $needed
     * @param array $arr
     * @return mixed
     */
    public static function get(string|array $needed, array $arr): mixed
    {
        $path = is_string($needed) ? explode('.', $needed) : $needed;
        $value = null;

        if (count($path) > 0) {
            if (!array_key_exists($path[0], $arr)) {
                return null;
            }

            $value = $arr[$path[0]];
        }

        array_shift($path);

        return count($path) ? self::get($path, $value) : $value;
    }

    /**
     * @param string|array $needed
     * @param array $array
     * @return bool
     */
    public static function exists(string|array $needed, array $array): bool
    {
        $path = is_string($needed) ? explode('.', $needed) : $needed;
        $exists = array_key_exists($path[0], $array);
        $array = $exists ? $array[$path[0]] : $array;
        array_shift($path);

        return count($path) && $exists ? self::exists($path, $array) : $exists;
    }
}