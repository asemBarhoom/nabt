<?php

namespace App\Http\Resources\Landmark;

use App\Helpers\FileHelper;
use App\Http\Resources\Image\ImageCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class LandmarkResource extends JsonResource
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
            'image' => object_get($this , 'image'),
            'images' => ImageCollection::make($this->images),
//            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,
        ];
    }
}
