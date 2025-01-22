<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\API\Inbox\StoreInboxRequest;
use App\Http\Resources\Inbox\InboxInfoResource;
use App\Models\Inbox;

class InboxController
{
    public function store(StoreInboxRequest $request)
    {
        try {

            $userId = auth()->guard('api')->id();

            // Create a new form record
            $inbox = new Inbox();
            $inbox->name = $request->name;
            $inbox->phone = $request->phone;
            $inbox->subject = $request->subject;
            $inbox->message = $request->message;
            $inbox->user_id = $userId;
            // Save the form to the database
            $inbox->save();

            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new InboxInfoResource($inbox));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


}
