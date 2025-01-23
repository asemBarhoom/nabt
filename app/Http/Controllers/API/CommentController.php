<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\API\Comment\StoreCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;

class CommentController
{
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
