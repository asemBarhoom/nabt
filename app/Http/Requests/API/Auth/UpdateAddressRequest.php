<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\BaseRequest as FormRequest;
use App\Rules\CityBelongsToCountry;

class UpdateAddressRequest extends FormRequest
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
            'country_id' => [
                'required',
                'exists:countries,id',
            ],
            'city_id' => [
                'nullable',
                'exists:cities,id',
                new CityBelongsToCountry(request('country_id')),
            ],
            'address' => [
                'nullable',
                'string',
            ],

        ];
    }
}
