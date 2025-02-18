<?php

namespace App\Http\Resources\Modification;

use Illuminate\Http\Resources\Json\JsonResource;

class ModificationResource extends JsonResource
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
            'body' => object_get($this,'body'),
            'booking_id' => object_get($this,'booking_id'),
        ];
    }
}
