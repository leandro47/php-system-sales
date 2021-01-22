<?php

namespace App\Controllers;

use App\Validations\SaleValidation;
use App\Services\SaleService;
use System\Controller\Controller;
use System\View\View;

class SaleController extends Controller
{
    private $saleService;
    private $saleValidation;

    public function __construct()
    {
        $this->saleService = new SaleService;
        $this->saleValidation = new SaleValidation();

        $this->data['titlePage'] = 'Venda';
    }

    public function index()
    { 
        View::load('includes/head', $this->data);
        View::load('sale/index', $this->data);
        View::load('includes/footer', $this->data);
        View::load('includes/scripts', $this->data);
    }   
    
}
