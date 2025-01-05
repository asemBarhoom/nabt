<?php

namespace App\Http\Resources\Destination;

use App\Helpers\FileHelper;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Image\ImageCollection;
use App\Http\Resources\Testimonial\TestimonialCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
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
            'slug' => object_get($this,'slug'),
            'name' => object_get($this,'name'),
            'body' => object_get($this,'body'),
            'lat' => object_get($this,'lat'),
            'lng' => object_get($this,'lng'),
            'description' => object_get($this,'description'),
            'weather_description' => object_get($this,'weather_description'),
            'amenities' => object_get($this,'amenities'),
            'recommended_visit_season' => object_get($this,'recommended_visit_season'),
            'category' => CategoryResource::make($this->category),
            'annual_visitors_min' => object_get($this,'annual_visitors_min'),
            'annual_visitors_max' => object_get($this,'annual_visitors_max'),
            'rating' => number_format(object_get($this, 'rating'), 2),
            'cover_image' => !empty($this->cover_image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'cover_image')) : null,
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,
            'images' => ImageCollection::make($this->images),
            'testimonials' => TestimonialCollection::make($this->testimonials()->paginate($request->header('perpage'))),
            'isFavorited' => $this->isFavoritedBy(auth()->user()),
        ];
    }
}
