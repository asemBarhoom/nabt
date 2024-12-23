<?php

namespace App\Http\Requests;

use App\Helpers\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class BaseRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    public function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        // Get the validation errors
        $errors = $validator->errors()->all();

        // Throw a custom response with validation error messages
        throw new HttpResponseException(
            Response::respondError('Validation failed', 422,$errors, )
        );

    }

}
