<?php

namespace App\Http\Resources\Accommodation;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class AccommodationInfoResource extends JsonResource
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
            'type' => object_get($this,'type'),
            'body' => object_get($this,'body'),
            'rating' => object_get($this,'rating'),
            'price' => object_get($this,'price'),
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,
        ];
    }
}
