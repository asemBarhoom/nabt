<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Landmark\LandmarkCollection;
use App\Http\Resources\Landmark\LandmarkInfoResource;
use App\Http\Resources\Landmark\LandmarkResource;
use App\Models\Landmark;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $landmarks = Landmark::filter()->order()->paginate($request->header('perlandmark'));
            return Response::respondSuccess(Response::SUCCESS, new LandmarkCollection($landmarks));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Landmark $landmark)
    {
        try{
            return Response::respondSuccess(Response::SUCCESS, new LandmarkInfoResource($landmark));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }



}
