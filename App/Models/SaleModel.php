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
        $this->table = 'itens_sale';
        return $this->insert($datas);
    }

    public function getAll()
    {
        $sql = "SELECT s.id, to_char(s.total_imposed, 'L9G999G990D99')imposed, to_char(s.total_sale, 'L9G999G990D99')sale, to_char(s.total_pay, 'L9G999G990D99')pay, date_register from sale as s";
        return $this->run($sql);
    }

    public function getItens(int $id)
    {
        $sql = "SELECT description, amount, to_char(price_uni,'L9G999G990D99')price_uni, percentage_imposed,  to_char(total_pay, 'L9G999G990D99')total_pay from itens_sale where id_sale = {$id}";
        return $this->run($sql);
    }

    public function deleteSale(int $id)
    {
        return $this->delete($id);
    }
}
