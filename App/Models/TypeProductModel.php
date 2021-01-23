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
        return $this->get();
    }

    public function insertTypeProduct(array $datas)
    {
        return $this->insert($datas);
    }

    public function updateTypeProduct(int $id, array $datas)
    {
        return $this->update($id, $datas);
    }
}
