<?php

namespace App\Services;

use App\Models\SaleModel;

class SaleService
{
    protected $saleModel;

    public function __construct()
    {
        $this->saleModel = new SaleModel;
    }

    public function get()
    { 
        
    }
}
