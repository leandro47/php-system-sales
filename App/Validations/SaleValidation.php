<?php

namespace App\Validations;

use System\Response\Response;
use System\Validation\Validation;

class SaleValidation extends Validation
{
    public function validateSale(array $datas): array
    {
        return $this->validate($datas);
    }

    public function validateItens(array $datas): array
    {
        foreach ($datas as $row) {
            $result = null;
            $result = $this->validate($row);
            if ($result['code'] !== Response::HTTP_OK)
                return $result;
        }

        return [
            'code'    => Response::HTTP_OK,
            'message' => 'OK',
            'data'    => [
                'icon' => 'success'
            ]
        ];
    }
}
