<?php

namespace App\Helpers;

class UtilsHelper
{
    public static function debug($d)
    {
        if (is_array($d) || is_object($d)) {
            echo '<pre>';
            var_dump($d);
        } else {
            echo $d;
        }
    }

    public static function formatMoney($value) :float
    {
        $return = str_replace('.', '', $value);
        $return = str_replace('R$', '', $return);
        return str_replace(',', '.', $return);
    }

    public static function removeSpaces($value): string
    {
        return str_replace(' ', '', $value);
    }

}
