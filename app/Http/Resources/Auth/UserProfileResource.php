<?php

namespace App\Http\Resources\Auth;

use App\Helpers\FileHelper;
use App\Http\Resources\Country\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
            'id'                => $this->id,
            'name'              => $this->name,
            'phone'              => $this->phone,
            'age'              => $this->age,
            'country_id'              => $this->country_id,
            'city_id'              => $this->city_id,
            'country'              => CountryResource::make($this->country),
            'city'              => CountryResource::make($this->city),
            'address'              => $this->address,
            'job'              => $this->job,
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleDefaultAsset(object_get($this , 'image')) : null,
            'dob'             => $this->dob,
            'email'             => $this->email,
        ];
    }
}
