<?php

namespace App\Http\Resources\Step;

use App\Http\Resources\Page\StepsSectionResource;
use App\Http\Resources\PaginationResource;
use App\Models\Setting;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StepCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $setting = Setting::first();

        return [
            'texts' => new StepsSectionResource($setting),
            'content' => StepResource::collection($this->collection),
            'pagination' => new PaginationResource($this->resource),
        ];
    }
}
