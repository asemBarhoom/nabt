<?php

namespace App\Http\Resources\Number;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class NumberResource extends JsonResource
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
            'value' => number_format(object_get($this, 'value'), 2, '.', ','),
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,

        ];
    }
}
