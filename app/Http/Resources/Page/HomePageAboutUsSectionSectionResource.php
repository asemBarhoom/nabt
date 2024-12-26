<?php

namespace App\Http\Resources\Page;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class HomePageAboutUsSectionSectionResource extends JsonResource
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
            'image' => !empty($this->valueOf('about_image')) ? FileHelper::getFullPathSingleAsset($this->valueOf('about_image')) : null,
            'title' => $this->valueOf('about_section_title_'.$lang),
            'body' => $this->valueOf('about_section_body_'.$lang),


        ];
    }
}
