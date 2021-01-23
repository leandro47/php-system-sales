<?php

namespace App\Models;

use System\Database\Database;

class TypeProductModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'typeProduct';
    }
    public function getAll()
    {
        $sql = 'SELECT * FROM typeProduct';

        $result = $this->run($sql);
        return $result;
    }

    public function insertTypeProduct(array $datas)
    {
        return $this->insert($datas);
    }
}
