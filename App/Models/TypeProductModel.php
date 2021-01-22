<?php

namespace App\Models;

use System\Database\Database;

class TypeProductModel extends Database
{
    public function getAll()
    { 
        $sql = 'SELECT * FROM typeProduct';
        
        $result = $this->run($sql);
        return $result;
    }
}
