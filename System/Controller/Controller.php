<?php

namespace System\Controller;

class Controller
{
    protected $data;
    protected $fields;

    protected function post(string $name, bool $useFilter = false, int $filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS)
    {
        if ($useFilter)
            return filter_var($_POST[$name], $filter);

        return $_POST[$name];
    }
}
