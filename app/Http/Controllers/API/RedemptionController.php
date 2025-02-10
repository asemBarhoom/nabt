<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\API\Redemption\RedemptionRequest;
use App\Http\Resources\Redemption\RedemptionResource;
use App\Models\Redemption;
use App\Models\Reward;

class RedemptionController
{
    public function autoRedeem(RedemptionRequest $request)
    {
        $user = $request->user();

        // Find the highest possible reward
        $reward = Reward::query()
                    ->where('status',1)
                    ->where('points_balance', '<=', $user->total_points)
                    ->where('points_balance', '>', 0)
                    ->orderBy('points_balance', 'desc')
                    ->first();

        if (!$reward) {
            return Response::respondError('Not enough points for any reward', 400);
        }

//        // Deduct points and create a redemption record
        $points = $user->points()
            ->where('status', 'approved') // Only approved points
            ->where('redeemable', true)
            ->get(); // Fetch the points as a collection

        foreach ($points as $point) {
            $point->update([
                   'status' => 'redeemed',
                   'redeemable' => false
                   ]);
        }


        $redemption = Redemption::create([
                                             'user_id' => $user->id,
                                             'reward_id' => $reward->id,
                                             'points_deducted' => $reward->points_balance,
                                             'credit_received' => $reward->money_balance,
                                             'remaining_credit' => 0,
                                         ]);

        return Response::respondSuccess('Reward redeemed successfully', new RedemptionResource($redemption));

    }
}
