<?php

namespace System\View;

class View
{
    public static function load(string $view, array $array = [])
    {
        extract($array);

        $file = dirname(__FILE__, 3) . "/App/Views/{$view}.php";

        if (!file_exists($file)) {
            die("Oh no!! File or directory file not found : {$file}");
        }
        require $file;
    }
}
