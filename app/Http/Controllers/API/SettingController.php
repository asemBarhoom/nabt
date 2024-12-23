<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Setting\SettingCollection;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterRequest $request){
        try{
            $surveys = Setting::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new SettingCollection($surveys));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
