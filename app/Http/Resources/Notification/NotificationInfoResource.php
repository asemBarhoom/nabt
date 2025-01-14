<?php

namespace App\Http\Resources\Notification;

use App\Helpers\Constant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class NotificationInfoResource extends JsonResource
{


    /**
     * @param Request $request
     * @return array
     */

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'data' => $this->data,
            'read_at' => is_null($this->read_at)?null:$this->read_at->diffForHumans(),
            'created_at' => $this->created_at->diffForHumans(),

        ];
    }
}


