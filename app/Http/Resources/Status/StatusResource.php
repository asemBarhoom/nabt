<?php

namespace App\Http\Resources\Status;

use App\Helpers\FileHelper;
use App\Http\Resources\Auth\UserProfileResource;
use App\Http\Resources\Booking\BookingResource;
use App\Http\Resources\Destination\DestinationResource;
use App\Http\Resources\Tourevent\ToureventResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class StatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Determine the appropriate resource based on statusable_type
        $statusableResource = match ($this->statusable_type) {
            'App\Models\Destination' => new DestinationResource($this->statusable),
            'App\Models\Tourevent' => new ToureventResource($this->statusable),
            'App\Models\Booking' => new BookingResource($this->statusable),
            default => null,
        };

        return [
                 'id' => $this->id,
                 'status' => $this->status,
                 'user' => $this->user ? new UserProfileResource($this->user) : null,
                 'statusable' => $statusableResource,
                 'created_at' => $this->created_at ? Carbon::parse($this->created_at)->toDateTimeString() : null,
                 'updated_at' => $this->updated_at ? Carbon::parse($this->updated_at)->toDateTimeString() : null,
         ];
    }
}
