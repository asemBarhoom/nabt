<?php

namespace App\Http\Resources\Restaurant;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'restaurant_name' => $this->restaurant_name,
            'desired_food' => $this->desired_food,
            'reservation_time' => $this->reservation_time,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at ,
            'updated_at' => $this->updated_at

        ];
    }
}
