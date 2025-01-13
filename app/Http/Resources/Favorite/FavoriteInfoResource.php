<?php

namespace App\Http\Resources\Favorite;

use App\Helpers\FileHelper;
use App\Http\Resources\Accommodation\AccommodationResource;
use App\Http\Resources\Booking\BookingInfoResource;
use App\Http\Resources\Destination\DestinationResource;
use App\Http\Resources\Tourevent\ToureventResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // Determine the appropriate resource based on favorable_type
        $favorableResource = match ($this->favorable_type) {
            'App\Models\Destination' => new DestinationResource($this->favorable),
            'App\Models\Tourevent' => new ToureventResource($this->favorable),
            'App\Models\Booking' => new BookingInfoResource($this->favorable),
            'App\Models\Accommodation' => new AccommodationResource($this->favorable),
            default => null,
        };
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'favorable_type' => $this->favorable_type,
            'favorable' => $favorableResource, // Include the specific resource
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
