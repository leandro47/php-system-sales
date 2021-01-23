<?php

namespace App\Validations;

use System\Validation\Validation;

class TypeProductValidation extends Validation
{
    public function validateTypeProduct(array $datas): array
    {
        return $this->validate($datas);
    }
}
