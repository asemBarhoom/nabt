<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $categoriess = Category::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new CategoryCollection($categoriess));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function show($categoriable_type){
        try{
            $categoriess = Category::query()->where('categoriable_type','like','%'.$categoriable_type.'%')->paginate(\request()->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new CategoryCollection($categoriess));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
