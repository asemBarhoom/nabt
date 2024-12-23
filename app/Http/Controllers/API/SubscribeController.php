<?php

namespace App\Http\Controllers\API;
use App\Helpers\Response;
use App\Http\Requests\API\Subscribe\StoreSubscribeRequest;
use App\Models\Subscribe;
use App\Http\Resources\Subscribe\SubscribeResource;
use Exception;

class SubscribeController
{
    public function store(StoreSubscribeRequest $request)
    {
        try {
            $data = $request->validated();
            $subscribe = Subscribe::create($data);
            return Response::respondSuccess(Response::SUCCESS, new SubscribeResource($subscribe));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
