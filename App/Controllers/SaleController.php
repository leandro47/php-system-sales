<?php

namespace App\Controllers;

use App\Helpers\UtilsHelper;
use App\Validations\SaleValidation;
use App\Services\SaleService;
use System\Controller\Controller;
use System\Response\Response;
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

    public function insert()
    {
        $this->fields['totalImposed'] = $this->post('totalImposed', true);
        $this->fields['totalSale'] = $this->post('totalSale', true);
        $this->fields['totalPay'] = $this->post('totalPay', true);
        $itens = $this->post('items');

        $validation = $this->saleValidation->validateSale($this->fields);

        if ($validation['code'] !== Response::HTTP_OK)
            return Response::sendDatas($validation);

        $validation = $this->saleValidation->validateItens($itens);

        if ($validation['code'] !== Response::HTTP_OK)
            return Response::sendDatas($validation);

        $sale = $this->saleService->insert($this->fields, $itens);
        Response::sendDatas($sale);
    }
}
