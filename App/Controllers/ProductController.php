<?php

namespace App\Controllers;

use App\Helpers\UtilsHelper;
use App\Models\ProductModel;
use System\Response\Response;
use System\View\View;

class ProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function home()
    {
      echo 'home';
    }

    public function teste()
    {
        echo 'teste';
    }
}
