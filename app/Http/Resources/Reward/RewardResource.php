<?php

namespace App\Http\Resources\Reward;

use App\Http\Resources\Image\ImageCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class RewardResource extends JsonResource
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
            'points_balance' => object_get($this,'points_balance'),
            'money_balance' => t('reward_text',['money'=>object_get($this,'money_balance')]),
        ];
    }
}
