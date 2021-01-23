<?php

namespace App\Models;

use System\Database\Database;

class ProductModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'product';
    }

    public function getAll()
    {
        $sql = "SELECT pro.id, 
        pro.description,
        FORMAT(pro.price, 2, 'de_DE')price,
        (typ.description)typeProduct,
        (typ.id)idType,
        typ.percentageImposed 
        from product as pro 
        join typeProduct as typ 
        on pro.idType = typ.id
        order by pro.id desc";

        return $this->run($sql);
    }

    public function insertProduct(array $datas)
    {
        return $this->insert($datas);
    }

    public function updateProduct(int $id, array $datas)
    {
        return $this->update($id, $datas);
    }

    public function deleteProduct(int $id)
    {
        return $this->delete($id);
    }
}
