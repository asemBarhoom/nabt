<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Resources\Number\NumberCollection;
use App\Models\Number;
use Illuminate\Http\Request;

class NumberController
{
    public function index(Request $request)
    {
        try{
            $Numbers = Number::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new NumberCollection($Numbers));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
