<?php

namespace App\Services;

use App\Models\ProductModel;
use System\Response\Response;

class ProductService
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel;
    }

    public function getAll()
    {
        return $this->productModel->getAll();
    }

    public function getByType(int $idType)
    {
        return $this->productModel->getByType($idType);
    }

    public function getById(int $id)
    {
        return $this->productModel->getById($id);
    }

    public function insert(array $datas): array
    {
        $result =  $this->productModel->insertProduct($datas);

        if (!is_int($result)) {
            return [
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $result,
                'data' => [
                    'icon' => 'error'
                ]
            ];
        }

        return [
            'code' => Response::HTTP_OK,
            'message' => 'Inserido com sucesso!',
            'data' => [
                'icon' => 'success'
            ]
        ];
    }

    public function update(int $id, $datas): array
    {
        $result = $this->productModel->updateProduct($id, $datas);

        if ($result) {
            return [
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $result,
                'data' => [
                    'icon' => 'error'
                ]
            ];
        }
        return [
            'code' => Response::HTTP_OK,
            'message' => 'Atualizado com sucesso!',
            'data' => [
                'icon' => 'success'
            ]
        ];
    }

    public function delete(int $id): array
    {
        $result = $this->productModel->deleteProduct($id);

        if ($result) {
            return [
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $result,
                'data' => [
                    'icon' => 'error'
                ]
            ];
        }
        return [
            'code' => Response::HTTP_OK,
            'message' => 'Deletado com sucesso!',
            'data' => [
                'icon' => 'success'
            ]
        ];
    }
}
