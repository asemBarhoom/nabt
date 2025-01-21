<?php

namespace App\Http\Resources\Activity;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'activable_type' => $this->activable_type,
            'description' => $this->description,
            'image' => $this->image
                ? \App\Helpers\FileHelper::getFullPathSingleAsset($this->image)
                : null,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'date' => $this->date,
            'read_at' => is_null($this->read_at)?null:$this->read_at->diffForHumans(),
        ];
    }
}
