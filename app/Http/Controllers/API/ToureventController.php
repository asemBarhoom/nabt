<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Tourevent\ToureventCollection;
use App\Http\Resources\Tourevent\ToureventResource;
use App\Models\Tourevent;

class ToureventController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $rateNumber = $request->input('filters.rating_number');

            $tourevents = Tourevent::filterByRating($rateNumber)->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new ToureventCollection($tourevents));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function show(Tourevent $tourevent){
        try{
            return Response::respondSuccess(Response::SUCCESS, new ToureventResource($tourevent));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
