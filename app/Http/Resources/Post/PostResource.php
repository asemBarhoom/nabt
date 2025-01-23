<?php

namespace App\Http\Resources\Post;

use App\Helpers\FileHelper;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\SystemAdmin\SystemAdminResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'body_text' => strip_tags(object_get($this,'body')),
            'body' => object_get($this,'body'),
            'image' => !empty($this->image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'image')) : null,
            'cover_image' => !empty($this->cover_image) ? FileHelper::getFullPathSingleAsset(object_get($this , 'cover_image')) : null,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'systemAdmin'=>SystemAdminResource::make(object_get($this,'systemAdmin')),
        ];
    }
}
