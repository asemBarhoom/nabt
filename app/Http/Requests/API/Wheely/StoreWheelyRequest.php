<?php

namespace App\Http\Requests\API\Wheely;

use App\Http\Requests\BaseRequest as FormRequest;

class StoreWheelyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'car_description' => 'required',
            'booking_duration' => 'nullable|string',
            'start_time' => 'nullable',
            'pickup_location' => 'nullable',
            'dropoff_location' => 'nullable',
        ];
    }

}
