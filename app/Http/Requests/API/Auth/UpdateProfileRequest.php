<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\BaseRequest as FormRequest;
use Illuminate\Validation\Rule;

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
                Rule::unique('users', 'phone')->ignore(auth()->guard('api')->user()->id),
            ],
            'prefix' => [
                'required',
                'string',
            ],
            'email' => [
                'nullable',
                'email',
                'string',
                Rule::unique('users', 'email')->ignore(auth()->guard('api')->user()->id),

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
                Rule::unique('users', 'name')->ignore(auth()->guard('api')->user()->id),
            ],
        ];
    }
}
