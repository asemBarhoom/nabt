<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\API\Modification\StoreModificationRequest;
use App\Http\Resources\Modification\ModificationResource;
use App\Models\Modification;

class ModificationController
{
    public function store(StoreModificationRequest $request)
    {
        try {
            $user = auth()->guard('api')->user();

            $modification = new Modification();
            $modification->body = $request->body;
            $modification->user_id = $user->id;
            $modification->booking_id = $request->booking_id;
            $modification->save();

            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new ModificationResource($modification));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

}
