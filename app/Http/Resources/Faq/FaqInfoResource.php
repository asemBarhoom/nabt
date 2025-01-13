<?php

namespace App\Http\Resources\Faq;

use App\Helpers\FileHelper;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Image\ImageCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqInfoResource extends JsonResource
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
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,
            'category' => CategoryResource::make($this->category),

        ];
    }
}
