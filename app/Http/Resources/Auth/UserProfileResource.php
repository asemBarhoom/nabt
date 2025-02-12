<?php

namespace App\Http\Resources\Auth;

use App\Helpers\FileHelper;
use App\Http\Resources\Country\CountryResource;
use App\Models\Country;
use Carbon\Carbon;
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
            'current_points'              => $this->total_points,
            'marketing_token'              => $this->marketing_token,
            'level'              => 'متوسط',
            'prefix'              => $this->prefix,
            'flag'              => Country::getFlagByPrefix($this->prefix),
            'phone'              => $this->phone,
            'age'              => $this->age,
            'country_id'              => $this->country_id,
            'city_id'              => $this->city_id,
            'country'              => CountryResource::make($this->country),
            'city'              => CountryResource::make($this->city),
            'address'              => $this->address,
            'job'              => $this->job,
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleDefaultAsset(object_get($this , 'image')) : null,
            'dob' => $this->dob ? Carbon::parse($this->dob)->format('Y-m-d') : null,
            'email'             => $this->email,
            'valid_code'             => $this->valid_code,
        ];
    }
}
