<?php

namespace App\Http\Controllers\API;

use App\Helpers\General;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Favorite\StoreFavoriteRequest;
use App\Http\Requests\API\Favorite\DestroyFavoriteRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Destination\DestinationCollection;
use App\Http\Resources\Destination\DestinationResource;
use App\Http\Resources\Favorite\FavoriteInfoResource;
use App\Http\Resources\Favorite\FavoriteCollection;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $favorites = Favorite::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new DestinationCollection($favorites));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function store(StoreFavoriteRequest $request)
    {
        try {

            $user = auth()->user();
            $favorableModel = $request->favorable_type::findOrFail($request->favorable_id);
            $favorableModel->addFavorite($user);
            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new DestinationResource($favorableModel));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


    public function destroy(DestroyFavoriteRequest $request)
    {
        try {

            $user = auth()->user();
            $favorableModel = $request->favorable_type::findOrFail($request->favorable_id);
            $favorableModel->removeFavorite($user);
            return Response::respondSuccess(Response::DELETED_SUCCESSFULLY);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

}
