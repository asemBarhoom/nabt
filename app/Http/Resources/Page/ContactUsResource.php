<?php

namespace App\Http\Resources\Page;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
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
            'title' => $this->valueOf('contact_us_'.$lang),
            'address' => $this->valueOf('contact_address_'.$lang),
            'phone' => $this->valueOf('contact_phone'),
            'instagram' => $this->valueOf('instagram'),
            'twitter' => $this->valueOf('twitter'),
            'tikTok' => $this->valueOf('tikTok'),
            'linkedIn' => $this->valueOf('linkedIn'),
            'snapchat' => $this->valueOf('snapchat'),
            'youTube' => $this->valueOf('youTube'),
            'whatsApp' => $this->valueOf('whatsApp'),
            'email' => $this->valueOf('email'),
            'lat' => $this->valueOf('lat'),
            'lng' => $this->valueOf('lng'),
            'footer' => $this->valueOf('contact_us_footer_'.$lang),
            'footer_body' => $this->valueOf('contact_us_body_footer_'.$lang),

        ];    }
}
