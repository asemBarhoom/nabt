<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\API\Restaurant\StoreRestaurantRequest;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Models\Restaurant;

class RestaurantController
{
    public function store(StoreRestaurantRequest $request)
    {
        try {

            $user = auth()->guard('api')->user();

            $restaurant = new Restaurant();
            $restaurant->restaurant_name = $request->restaurant_name;
            $restaurant->desired_food = $request->desired_food;
            $restaurant->reservation_time = $request->reservation_time;
            $restaurant->user_id = $user->id;

            $restaurant->save();

            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new RestaurantResource($restaurant));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


}
