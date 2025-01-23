<?php

namespace App\Http\Resources\SystemAdmin;

use App\Http\Resources\PaginationResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SystemAdminCollection extends ResourceCollection
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
            'content' => SystemAdminResource::collection($this->collection),
            'pagination' => new PaginationResource($this->resource),
        ];
    }
}
