<?php


namespace App\Helpers;


class Utils
{
    public static function isAssoc(array $array): bool {
        if ($array == []) return false;
        return array_keys($array) !== range(0, count($array) - 1);
    }
}
