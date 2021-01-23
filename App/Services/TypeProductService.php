<?php

namespace App\Services;

use App\Models\TypeProductModel;
use System\Response\Response;

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

    public function insert(array $datas) : array
    {
        $result =  $this->typeProductModel->insertTypeProduct($datas);

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

    public function update(int $id, $datas) : array
    {
        $result = $this->typeProductModel->updateTypeProduct($id, $datas);

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

    public function delete(int $id) : array
    { 
        $result = $this->typeProductModel->deleteTypeProduct($id);

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
