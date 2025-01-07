<?php

namespace App\Http\Requests\API\Booking;


use App\Constants\RoomType;
use App\Constants\TripTypes;
use App\Constants\VehicleType;
use App\Http\Requests\BaseRequest as FormRequest;
use Illuminate\Validation\Rule;

class StoreBookingRequest extends FormRequest
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
            'destination_id' => 'required|exists:destinations,id',
            'accommodation_id' => 'required|exists:accommodations,id',
            'tourevent_id' => 'required|exists:tourevents,id',
            'booking_date' => 'required|date|after_or_equal:' . now()->addDays(7)->toDateString(),
            'arrival_time' => 'required|date_format:H:i:s',
            'num_adults' => 'required|integer|min:1',
            'num_children' => 'nullable|integer|min:0',
            'num_rooms' => 'nullable|integer|min:1',
            'room_type' => ['required',Rule::in(RoomType::all())],
            'num_meals' => 'nullable|integer|min:0',
            'meal_notes' => 'nullable|string|max:1000',
            'trip_type' => ['required',Rule::in(TripTypes::all())],
            'vehicle_type' => ['required',Rule::in(VehicleType::all())],
            'food_allergies' => 'required|boolean',
            'vehicle_description' => 'nullable|string|max:255',
            'events' => [
                'nullable',
                'array',
                Rule::exists('events', 'id'),
            ],
            ];
    }
}
