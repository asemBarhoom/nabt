<?php

namespace App\Http\Resources\Tourevent;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ToureventResource extends JsonResource
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
            'name' => object_get($this,'name'),
            'position' => object_get($this,'position'),
            'at' => object_get($this,'at'),
            'body' => object_get($this,'body'),
            'description' => object_get($this,'description'),
            'rating' => object_get($this,'rating'),
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,
            'cover_image' => !empty($this->cover_image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'cover_image')) : null,
        ];
    }
}
