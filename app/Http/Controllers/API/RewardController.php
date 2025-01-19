<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Reward\RewardCollection;
use App\Http\Resources\Reward\RewardResource;
use App\Models\Reward;

class RewardController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $rewards = Reward::where('status',true)->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new RewardCollection($rewards));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function show(Reward $tourevent){
        try{
            return Response::respondSuccess(Response::SUCCESS, new RewardResource($tourevent));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
