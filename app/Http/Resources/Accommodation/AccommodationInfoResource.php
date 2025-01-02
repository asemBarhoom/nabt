<?php

namespace App\Http\Resources\Accommodation;

use App\Helpers\FileHelper;
use App\Http\Resources\Image\ImageCollection;
use App\Http\Resources\Testimonial\TestimonialCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AccommodationInfoResource extends JsonResource
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
            'title' => object_get($this,'title'),
            'type' => object_get($this,'type'),
            'body' => object_get($this,'body'),
            'rating' => object_get($this,'rating'),
            'price' => object_get($this,'price'),
            'rooms' => object_get($this,'rooms'),
            'restaurants' => object_get($this,'restaurants'),
            'cafes' => object_get($this,'cafes'),
            'wifi' => object_get($this,'wifi'),
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,
            'images' => ImageCollection::make($this->images),
            'testimonials' => TestimonialCollection::make($this->testimonials()->paginate($request->header('perpage'))),

        ];
    }
}
