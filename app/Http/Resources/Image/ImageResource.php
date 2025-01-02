<?php

namespace App\Http\Resources\Image;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'image' => !empty($this->image_path) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image_path')) : null,
            'imageable_id' => object_get($this,'imageable_id'),
            'imageable_type' => object_get($this,'imageable_type'),
        ];
    }
}
