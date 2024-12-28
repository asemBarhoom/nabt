<?php

namespace App\Http\Resources\Booking;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reservation_number' => $this->reservation_number,
            'user_id' => $this->user_id,
            'destination_id' => $this->destination_id,
            'accommodation_id' => $this->accommodation_id,
            'booking_date' => $this->booking_date,
            'arrival_time' => $this->arrival_time,
            'num_adults' => $this->num_adults,
            'num_children' => $this->num_children,
            'num_rooms' => $this->num_rooms,
            'room_type' => $this->room_type,
            'num_meals' => $this->num_meals,
            'meal_notes' => $this->meal_notes,
            'car_type' => $this->car_type,
            'trip_type' => $this->trip_type,
            'food_allergies' => $this->food_allergies,
            'vehicle_type' => $this->vehicle_type,
            'vehicle_description' => $this->vehicle_description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
