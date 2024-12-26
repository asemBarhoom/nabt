<?php

namespace App\Http\Resources\Page;

use App\Helpers\FileHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class HomePageHeroSectionResource extends JsonResource
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
            'image' => !empty($this->valueOf('hero_image')) ? FileHelper::getFullPathSingleAsset($this->valueOf('hero_image')) : null,
            'video' => $this->valueOf('hero_video_link'),
            'promotional_message' => $this->valueOf('promotional_message_'.$lang),


        ];
    }
}
