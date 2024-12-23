<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Partner\PartnerCollection;
use App\Models\Partner;

class PartnerController
{
    public function index(FilterRequest $request){
        try{
            $tourevents = Partner::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new PartnerCollection($tourevents));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
