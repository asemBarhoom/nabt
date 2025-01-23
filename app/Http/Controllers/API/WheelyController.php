<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\API\Wheely\StoreWheelyRequest;
use App\Http\Resources\Wheely\WheelyResource;
use App\Models\Wheely;

class WheelyController
{
    public function store(StoreWheelyRequest $request)
    {
        try {

            $user = auth()->guard('api')->user();

            $wheely = new Wheely();
            $wheely->car_description = $request->car_description;
            $wheely->booking_duration = $request->booking_duration;
            $wheely->start_time = $request->start_time;
            $wheely->pickup_location = $request->pickup_location;
            $wheely->dropoff_location = $request->dropoff_location;
            $wheely->user_id = $user->id;

            $wheely->save();

            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new WheelyResource($wheely));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


}
