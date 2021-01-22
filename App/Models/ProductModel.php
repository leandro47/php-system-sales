<?php

namespace App\Models;

use System\Database\Database;

class ProductModel extends Database
{
    public function get()
    { 
       return $this->run('SELECT * FROM typeProduct');
    }
}
