<?php

namespace App\Commons\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ApiRequest extends FormRequest
{
    /**
     * @throws \Exception
     */
    protected function failedValidation(Validator $validator)
    {
        $formatError = [];
        $errors = $validator->getMessageBag()->toArray();
        foreach ($errors as $value) {
            $formatError[] = $value[0];
        }

        throw new HttpResponseException(response()->json([
            'error' => $formatError,
            'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
