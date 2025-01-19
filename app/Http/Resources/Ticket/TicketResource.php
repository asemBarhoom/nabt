<?php

namespace App\Http\Resources\Ticket;

use App\Helpers\FileHelper;
use App\Http\Resources\Auth\UserProfileResource;
use App\Http\Resources\Booking\BookingResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'ticket_id' => $this->ticket_id,
            'status' => StatusResource::make($this->currentStatus()),
            'category' => new CategoryResource($this->whenLoaded('category')), // Category data
            'booking' => new BookingResource($this->whenLoaded('booking')), // Booking data
            'user' => new UserProfileResource($this->whenLoaded('user')), // User data
            'body' => $this->body,
            'attachment_path' => !empty($this->attachment_path) ? FileHelper::getFullPathSingleAsset(object_get($this , 'attachment_path')) : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
