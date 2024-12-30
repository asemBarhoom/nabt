<?php

namespace App\Http\Resources\Page;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class StepsSectionResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = app()->getLocale();
        return [
            'image' => !empty($this->valueOf('steps_image')) ? FileHelper::getFullPathSingleAsset($this->valueOf('steps_image')) : null,
            'title' => $this->valueOf('steps_section_title_'.$lang),
            'sub_title' => $this->valueOf('steps_section_sub_title_'.$lang),
            'partner_title' => $this->valueOf('partner_section_title_'.$lang),
        ];
    }
}
