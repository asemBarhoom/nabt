<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Step\StepCollection;
use App\Models\Step;

class StepController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $steps = Step::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new StepCollection($steps));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
