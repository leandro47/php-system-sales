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
        to_char(pro.price, 'L9G999G990D99')price,
        (typ.description)type_product,
        (typ.id)id_type,
        typ.percentage_imposed 
        from product as pro 
        join type_product as typ 
        on pro.id_type = typ.id
        order by pro.id desc";

        return $this->run($sql);
    }

    public function getByType(int $idType)
    {
        $sql = "SELECT * FROM product where id_type = {$idType}";
        return $this->run($sql);
    }

    public function getById(int $id)
    {
        $sql = "SELECT (p.id)id_product , p.description, to_char(p.price, 'L9G999G990D99')price, (t.percentage_imposed)imposed FROM product as p join type_product as t on p.id_type = t.id where p.id = {$id}";
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
