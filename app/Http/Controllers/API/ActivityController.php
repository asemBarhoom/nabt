<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Activity\ActivityCollection;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $user = auth()->guard('api')->user();
            $activities = Activity::where('user_id', $user->id)
            ->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new ActivityCollection($activities));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
