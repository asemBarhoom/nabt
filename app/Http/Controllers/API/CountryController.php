<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Country\CountryInfoResource;
use App\Http\Resources\Country\CountryResource;
use App\Models\Country;
use App\Http\Resources\Country\CountryCollection;


class CountryController
{
    public function index(FilterRequest $request){
        try{
            $countries = Country::filter()->order()->get();
            return Response::respondSuccess(Response::SUCCESS, new CountryCollection($countries));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


    public function show(Country $country){
        try{
            return Response::respondSuccess(Response::SUCCESS, new CountryInfoResource($country));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
