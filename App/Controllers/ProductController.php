<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->get();
        var_dump($products->description);
    }
}
