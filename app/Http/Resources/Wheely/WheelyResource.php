<?php

namespace App\Http\Resources\Wheely;

use Illuminate\Http\Resources\Json\JsonResource;

class WheelyResource extends JsonResource
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
            'car_description' => $this->car_description,
            'booking_duration' => $this->booking_duration,
            'start_time' => $this->start_time,
            'pickup_location' => $this->pickup_location,
            'dropoff_location' => $this->dropoff_location,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ,
            'updated_at' => $this->updated_at ,

        ];
    }
}
