<?php

namespace App\Http\Resources\City;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'alpha_3' => object_get($this,'alpha_3'),
            'country' => object_get($this->country,'name'),
        ];
    }
}
