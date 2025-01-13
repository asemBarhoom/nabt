<?php

namespace App\Http\Requests\API\Favorite;
use App\Http\Requests\BaseRequest as FormRequest;
use App\Rules\FavorableIdExists;

class StoreFavoriteRequest extends FormRequest
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
            'favorable_id' => ['required', 'integer', new FavorableIdExists()],
            'favorable_type' => 'required|string|in:App\Models\Destination,App\Models\Booking,App\Models\Tourevent,App\Models\Accommodation',
        ];
    }
}
