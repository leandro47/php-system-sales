<?php

namespace App\Services;

use App\Models\SaleModel;
use System\Response\Response;

class SaleService
{
    protected $saleModel;
    protected $errors;
    public function __construct()
    {
        $this->saleModel = new SaleModel;
        $this->errors = null;
    }

    public function insert(array $datas, array $itens): array
    {
        $result = $this->saleModel->insertSale($datas);

        if (!is_int($result)) {
            return [
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $result,
                'data' => [
                    'icon' => 'error'
                ]
            ];
        }

        foreach ($itens as $row) {

            $item['idSale'] = $result;
            $item['idProduct'] = $row['idProduct'];
            $item['description'] = $row['description'];
            $item['amount'] = $row['amount'];
            $item['priceUni'] = $row['priceUni'];
            $item['percentageImposed'] = $row['percentageImposed'];
            $item['totalPay'] = $row['totalPay'];

            $this->insertItens($item);
        }

        if ($this->errors === null) {
            return [
                'code' => Response::HTTP_OK,
                'message' => 'Inserido com sucesso!',
                'data' => [
                    'icon' => 'success',
                ]
            ];
        }
        
        return [
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $this->errors,
            'data' => [
                'icon' => 'error'
            ]
        ];
    }

    private function insertItens(array $datas)
    {
        $result =  $this->saleModel->insertItem($datas);

        if (!is_int($result)) {
            $this->errors[] =  [
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $result,
                'data' => [
                    'icon' => 'error'
                ]
            ];
        }
    }
}
