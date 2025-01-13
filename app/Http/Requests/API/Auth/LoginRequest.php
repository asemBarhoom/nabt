<?php

namespace App\Http\Requests\API\Auth;

use App\Http\Requests\BaseRequest as FormRequest;

class LoginRequest extends FormRequest
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
                'integer', // Assuming country_id is an integer
                'exists:countries,id', // Ensure the country_id exists in the 'countries' table
            ],
            'prefix' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $countryId = request('country_id'); // Get the country_id from the request
                    $country = \App\Models\Country::find($countryId); // Fetch the country from the database

                    if ($country && $country->prefix !== $value) {
                        return $fail("The prefix does not match the country’s prefix.");
                    }
                },
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^[0-9]{6,14}$/', // Validate that the phone number contains 6 to 14 digits, adjust as needed
            ],
        ];
    }
}
