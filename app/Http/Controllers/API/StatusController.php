<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Status\StatusCollection;
use App\Http\Resources\Status\StatusResource;
use App\Models\Status;

class StatusController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $statuss = Status::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new StatusCollection($statuss));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function show(Status $status){
        try{
            return Response::respondSuccess(Response::SUCCESS, new StatusResource($status));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
