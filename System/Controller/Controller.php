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

    protected function put(string $name, bool $useFilter = false, int $filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS)
    {
        parse_str(file_get_contents('php://input'), $_PUT);

        if ($useFilter)
            return filter_var($_PUT[$name], $filter);

        return $_PUT[$name];
    }

    protected function del(string $name, bool $useFilter = false, int $filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS)
    {
        parse_str(file_get_contents('php://input'), $_DELETE);

        if ($useFilter)
            return filter_var($_DELETE[$name], $filter);

        return $_DELETE[$name];
    }
}
