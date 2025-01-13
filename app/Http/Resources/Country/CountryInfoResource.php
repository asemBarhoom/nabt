<?php

namespace App\Http\Resources\Country;

use App\Helpers\FileHelper;
use App\Http\Resources\City\CityCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryInfoResource extends JsonResource
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
            'cities' => CityCollection::make($this->cities),
            'flag' => !empty($this->flag) ? FileHelper::getFullPathSingleAsset(object_get($this , 'flag')) : null,
            'prefix' => object_get($this,'prefix'),
        ];
    }
}
