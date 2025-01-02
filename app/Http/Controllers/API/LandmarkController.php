<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Landmark\LandmarkCollection;
use App\Http\Resources\Landmark\LandmarkInfoResource;
use App\Models\Landmark;
use Illuminate\Http\Request;

class LandmarkController extends Controller
{

    public function index(Request $request)
    {
        try{
            $landmarks = Landmark::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new LandmarkCollection($landmarks));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }



 
    public function show(Landmark $landmark)
    {
        try{
            return Response::respondSuccess(Response::SUCCESS, new LandmarkInfoResource($landmark));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }



}
