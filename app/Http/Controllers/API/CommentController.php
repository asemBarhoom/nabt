<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\API\Comment\StoreCommentRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Comment\CommentCollection;
use App\Models\Comment;
use App\Models\Post;

class CommentController
{

    public function index(FilterRequest $request){
        try{
            $posts = Comment::filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new CommentCollection($posts));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
    public function store(StoreCommentRequest $request)
    {
        try {

            $user = auth()->guard('api')->user();

            $comment = new Comment();
            $comment->body = $request->body;
            $comment->user_id = $user->id;
            $comment->post_id = $request->post_id;

            $comment->save();

            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new CommentResource($comment));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


}
