<?php

namespace App\Http\Resources\Favorite;

use App\Helpers\FileHelper;
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
        return [
            'id' => object_get($this,'id'),
            'name' => object_get($this,'name'),
            'position' => object_get($this,'position'),
            'body' => object_get($this,'body'),
            'rating' => object_get($this,'rating'),
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,
        ];
    }
}
