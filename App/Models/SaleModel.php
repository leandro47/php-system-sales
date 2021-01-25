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

    public function getAll()
    {
        $sql = "SELECT s.id, FORMAT(s.totalImposed, 2, 'de_DE')imposed, FORMAT(s.totalSale, 2, 'de_DE')sale, FORMAT(s.totalPay, 2, 'de_DE')pay, dateRegister from sale as s";
        return $this->run($sql);
    }

    public function getItens(int $id)
    {
        $sql = "SELECT description, amount, FORMAT(priceUni, 2, 'de_DE')priceUni, percentageImposed,  FORMAT(totalPay, 2, 'de_DE')totalPay   from itensSale where idSale = {$id}";
        return $this->run($sql);
    }

    public function deleteSale(int $id)
    {
        return $this->delete($id);
    }
}
