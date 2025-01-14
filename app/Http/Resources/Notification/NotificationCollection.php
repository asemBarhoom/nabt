<?php

namespace App\Http\Resources\Notification;

use App\Http\Resources\PaginationResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

class NotificationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */

    protected $unread_notifications_count;

    public function __construct($resource,$unread_notifications_count=null)
    {
        parent::__construct($resource);
        $this->unread_notifications_count = $unread_notifications_count;
    }

    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'content' => NotificationResource::collection($this->collection),
            'unread_notifications_count' => $this->unread_notifications_count??0,
            'pagination' => new PaginationResource($this->resource),
        ];
    }
}
