<?php

namespace App\Http\Resources\Auth;

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
            'address'              => $this->address,
            'job'              => $this->job,
            'image'             => $this->image,
            'dob'             => $this->dob,
            'email'             => $this->email,
        ];
    }
}
