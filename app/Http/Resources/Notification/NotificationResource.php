<?php

namespace App\Http\Resources\Notification;

use App\Helpers\Constant;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class NotificationResource extends JsonResource
{

    /**
     * @param Request $request
     * @return array|JsonSerializable|Arrayable
     */

    public function toArray($request)
    {
        $data = $this->data;
        $data['id'] = $this->id;
        $data['read_at'] =  is_null($this->read_at)?null:$this->read_at->diffForHumans();
        $data['created_at'] = $this->created_at->diffForHumans();
        return $data;
    }
}


