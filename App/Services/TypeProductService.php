<?php

namespace App\Services;

use App\Models\TypeProductModel;

class TypeProductService
{
    private $typeProductModel;

    public function __construct()
    {
        $this->typeProductModel = new TypeProductModel;
    }
    public function  getAll()
    { 
        return $this->typeProductModel->getAll();
    }
}
