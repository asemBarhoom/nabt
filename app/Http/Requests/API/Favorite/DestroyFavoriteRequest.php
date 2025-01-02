<?php

namespace App\Http\Requests\API\Favorite;


use App\Constants\RoomType;
use App\Constants\TripTypes;
use App\Constants\VehicleType;
use App\Http\Requests\BaseRequest as FormRequest;
use Illuminate\Validation\Rule;

class DestroyFavoriteRequest extends FormRequest
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
            'favorable_id' => 'required|integer',
            'favorable_type' => 'required|string|in:App\Models\Destination',
        ];
    }
}
