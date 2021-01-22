<?php

namespace App\Controllers;

use App\Services\TypeProductService;
use App\Validations\TypeProductValidation;
use System\Controller\Controller;
use System\Response\Response;
use System\View\View;

class TypeProductController extends Controller
{
    private $typeProductValidation;
    private $typeProductServices;

    public function __construct()
    {
        $this->typeProductServices = new TypeProductService;
        $this->typeProductValidation = new TypeProductValidation;

        $this->data['titlePage'] = 'Tipo Produto';
    }

    public function index()
    {
        View::load('includes/head', $this->data);
        View::load('typeProduct/index', $this->data);
        View::load('includes/footer', $this->data);
        View::load('includes/scripts', $this->data);
    }

    public function getAll()
    { 
        $datas = $this->typeProductServices->getAll();
        Response::sendDatas($datas);
    }
}
