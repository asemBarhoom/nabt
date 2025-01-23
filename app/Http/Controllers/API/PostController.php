<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $posts = Post::with(['categories','comments'])->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new PostCollection($posts));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function show(Post $post){
        try{
            return Response::respondSuccess(Response::SUCCESS, new PostResource($post));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
