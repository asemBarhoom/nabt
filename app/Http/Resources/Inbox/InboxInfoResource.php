<?php

namespace App\Http\Resources\Inbox;


use Illuminate\Http\Resources\Json\JsonResource;

class InboxInfoResource extends JsonResource
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
            'phone' => object_get($this,'phone'),
            'subject' => object_get($this,'subject'),
            'message' => object_get($this,'message'),
            'user_id' => object_get($this,'user_id'),


        ];
    }
}
