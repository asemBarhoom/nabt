<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\BaseRequest as FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => [
                'required',
                'string',
                'unique:users,phone,' . $this->user()->id,
            ],
            'email' => [
                'nullable',
                'email',
                'string',
                'unique:users,email,' . $this->user()->id,
            ],
            'dob' => [
                'nullable',
                'date',
                'before:today',
            ],
            'job' => [
                'nullable',
                'string',
                'max:255',
            ],
            'name' => [
                'required',
                'string',
                'min:4',
                'max:255',
                'unique:users,name,' . $this->user()->id,
            ],
        ];
    }
}
