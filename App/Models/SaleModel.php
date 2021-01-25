<?php

namespace App\Models;

use System\Database\Database;

class SaleModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'sale';
    }

    public function insertSale(array $datas)
    {
        return $this->insert($datas);
    }

    public function insertItem(array $datas)
    { 
        $this->table = 'itensSale';
        return $this->insert($datas);
    }
}
