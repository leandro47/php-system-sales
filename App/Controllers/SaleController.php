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
        $this->fields['total_imposed'] = $this->post('total_imposed', true);
        $this->fields['total_sale'] = $this->post('total_sale', true);
        $this->fields['total_pay'] = $this->post('total_pay', true);
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

    public function show()
    {
        View::load('includes/head', $this->data);
        View::load('sale/show', $this->data);
        View::load('includes/footer', $this->data);
        View::load('includes/scripts', $this->data);
    }

    public function getAll()
    {
        $result = $this->saleService->getAll();
        Response::sendDatas($result);
    }

    public function getItens(int $id)
    {
        $result = $this->saleService->getItens($id);
        Response::sendDatas($result);
    }

    public function deleteSale(int $id)
    {
        $delete = $this->saleService->deleteSale($id);
        return Response::sendDatas($delete);
    }
}
