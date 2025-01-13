<?php

namespace App\Http\Resources\Cancellation;

use App\Helpers\FileHelper;
use App\Http\Resources\Booking\BookingInfoResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Image\ImageCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CancellationInfoResource extends JsonResource
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
            'id' => object_get($this,'id'),
            'title' => object_get($this,'title'),
            'body' => object_get($this,'body'),
            'category' => CategoryResource::make($this->category),
            'booking' => BookingInfoResource::make($this->booking),

        ];
    }
}
