<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Destination\DestinationCollection;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $destinations = Destination::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new DestinationCollection($destinations));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
