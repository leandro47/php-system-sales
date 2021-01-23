<?php

namespace System\Validation;

use System\Response\Response;

class Validation
{
    protected $validations;

    public function validate(array $datas): ?array
    {
        $keys = array_keys($datas);

        foreach ($keys as $key) {
            if ($datas[$key] === null || empty($datas[$key]) || $datas[$key] === '')
                $this->validations[] = 'field ' . $key . ' is required';
        }

        return $this->getValidation($this->validations);
    }

    private function getValidation($validation): array
    {
        if ($this->validations) {
            return  [
                'code'    => Response::HTTP_BAD_REQUEST,
                'message' => implode(", ", $validation),
                'data'    => [
                    'icon' => 'error'
                ]
            ];
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
