<?php

namespace App\Http\Requests\API\Restaurant;

use App\Http\Requests\BaseRequest as FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'restaurant_name' => 'required|string',
            'desired_food' => 'nullable|string',
            'reservation_time' => 'nullable|string',
        ];
    }

}
