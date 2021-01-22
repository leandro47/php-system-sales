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
}
