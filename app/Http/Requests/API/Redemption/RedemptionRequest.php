<?php

namespace App\Http\Requests\API\Redemption;


use App\Constants\RoomType;
use App\Constants\TripTypes;
use App\Constants\VehicleType;
use App\Http\Requests\BaseRequest as FormRequest;
use Illuminate\Validation\Rule;

class RedemptionRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to true if the user is authenticated
    }

    public function rules()
    {
        return [
            // No specific input for auto-redeem
        ];
    }
}
