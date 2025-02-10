<?php

namespace App\Http\Resources\Redemption;

use Illuminate\Http\Resources\Json\JsonResource;

class RedemptionResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'reward_id' => $this->reward_id,
//            'reward_description' => $this->reward ? $this->reward->description : null,
            'points_deducted' => $this->points_deducted,
            'credit_received' => $this->credit_received,
            'remaining_credit' => $this->remaining_credit,
//            'created_at' => $this->created_at->toDateTimeString(),
//            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
