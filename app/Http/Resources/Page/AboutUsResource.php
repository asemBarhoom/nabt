<?php

namespace App\Http\Resources\Page;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
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
            'title' => $this->valueOf('about_us_'.$lang),
            'vision_image' => $this->valueOf('vision_image'),
            'vision' => $this->valueOf('vision_'.$lang),
            'vision_body' => $this->valueOf('vision_'.$lang),
            'values_image' => $this->valueOf('values_image'),
            'values' => $this->valueOf('values_'.$lang),
            'values_body' => $this->valueOf('values_'.$lang),
            'goals_image' => $this->valueOf('goals_image'),
            'goals' => $this->valueOf('goals_'.$lang),
            'goals_body' => $this->valueOf('goals_'.$lang),
            'footer' => $this->valueOf('about_us_footer_'.$lang),

        ];
    }
}
