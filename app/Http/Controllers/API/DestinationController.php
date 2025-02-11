<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Destination\DestinationCollection;
use App\Http\Resources\Destination\DestinationResource;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $rateNumber = $request->input('filters.rating_number');

            $destinations = Destination::filterByRating($rateNumber)->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new DestinationCollection($destinations));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function show(Destination $destination){
        try{
            return Response::respondSuccess(Response::SUCCESS, new DestinationResource($destination));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
