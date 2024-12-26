<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Accommodation\AccommodationInfoResource;
use App\Http\Resources\Accommodation\AccommodationResource;
use App\Models\Accommodation;
use App\Http\Resources\Accommodation\AccommodationCollection;


class AccommodationController
{
    public function index(FilterRequest $request){
        try{
            $accommodations = Accommodation::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new AccommodationCollection($accommodations));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


    public function show(Accommodation $country){
        try{
            return Response::respondSuccess(Response::SUCCESS, new AccommodationInfoResource($country));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
