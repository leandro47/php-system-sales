<?php

namespace App\Validations;

use System\Validation\Validation;

class SaleValidation extends Validation
{
    public function validateSale(array $datas): array
    {
        return $this->validate($datas);
    }
}
