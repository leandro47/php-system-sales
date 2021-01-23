<?php

namespace App\Controllers;

use App\Helpers\UtilsHelper;
use App\Services\ProductService;
use App\Validations\ProductValidation;
use System\Controller\Controller;
use System\Response\Response;
use System\View\View;

class ProductController extends Controller
{
    private $productValidation;
    private $productServices;

    public function __construct()
    {
        $this->productServices = new ProductService;
        $this->productValidation = new ProductValidation;

        $this->data['titlePage'] = 'Produto';
    }

    public function index()
    {
        View::load('includes/head', $this->data);
        View::load('product/index', $this->data);
        View::load('includes/footer', $this->data);
        View::load('includes/scripts', $this->data);
    }

    public function getAll()
    {
        $datas = $this->productServices->getAll();
        Response::sendDatas($datas);
    }

    public function insert()
    {
        $this->fields['idType'] = $this->post('typeProduct', true);
        $this->fields['description'] = $this->post('description', true);
        $this->fields['price'] = UtilsHelper::formatMoney($this->post('price', true));

        $validation = $this->productValidation->validateProduct($this->fields);

        if ($validation['code'] !== Response::HTTP_OK)
            return Response::sendDatas($validation);

        $insert = $this->productServices->insert($this->fields);
        return Response::sendDatas($insert);
    }

    public function update()
    {
        $id = $this->put('idUpdate', true, FILTER_SANITIZE_NUMBER_INT);
        $this->fields['description'] = $this->put('updateDescription', true);
        $this->fields['price'] = UtilsHelper::formatMoney($this->put('updatePrice', true));
        $this->fields['idType'] = $this->put('updateTypeProduct', true);

        $validation = $this->productValidation->validateProduct($this->fields);

        if ($validation['code'] !== Response::HTTP_OK)
            return Response::sendDatas($validation);

        $update = $this->productServices->update($id, $this->fields);
        return Response::sendDatas($update);
    }

    public function delete()
    {
        $id = $this->del('idDelete', true, FILTER_SANITIZE_NUMBER_INT);

        $validation = $this->productValidation->validateProduct([$id]);

        if ($validation['code'] !== Response::HTTP_OK)
            return Response::sendDatas($validation);

        $delete = $this->productServices->delete($id);
        return Response::sendDatas($delete);
    }
}
