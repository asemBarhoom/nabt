<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Post\PostCollection;
use App\Models\Post;

class PostController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $posts = Post::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new PostCollection($posts));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
