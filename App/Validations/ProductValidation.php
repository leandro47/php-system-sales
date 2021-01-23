<?php

namespace App\Validations;

use System\Validation\Validation;

class ProductValidation extends Validation
{
    public function validateProduct(array $datas): array
    {
        return $this->validate($datas);
    }
}
