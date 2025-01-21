<?php

namespace App\Http\Controllers\API;
use App\Helpers\Response;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Point\PointCollection;
use App\Models\Point;
use App\Http\Resources\Point\PointResource;
use Exception;

class PointController
{
    public function index(FilterRequest $request){
        try{
            $points = Point::where('user_id',auth()->guard('api')->user()->id)
                ->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new PointCollection($points));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

}
