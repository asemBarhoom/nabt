<?php

namespace App\Http\Resources\Step;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class StepResource extends JsonResource
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
            'title' => object_get($this,'title'),
            'body' => object_get($this,'body'),
            'order' => object_get($this,'order'),
        ];
    }
}
