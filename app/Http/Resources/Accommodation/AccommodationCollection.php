<?php

namespace App\Http\Resources\Accommodation;

use App\Http\Resources\PaginationResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AccommodationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'content' => AccommodationResource::collection($this->collection),
            'pagination' => new PaginationResource($this->resource),
        ];
    }
}
