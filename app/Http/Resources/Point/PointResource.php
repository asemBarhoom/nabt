<?php

namespace App\Http\Resources\Point;

use App\Helpers\FileHelper;
use App\Http\Resources\Auth\UserProfileResource;
use App\Http\Resources\Booking\BookingResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PointResource extends JsonResource
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
            'user_id' => $this->user_id,
            'description' => $this->description,
            'points_earned' => $this->points_earned,
            'total_points' => $this->total_points,
            'points_type' => $this->points_type,
            'status' => $this->status,
            'expires_at' => $this->expires_at,
            'source' => $this->source,
            'is_adjustment' => $this->is_adjustment,
            'notes' => $this->notes,
            'redeemable' => $this->redeemable,
            'awarded_by' => $this->awarded_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
