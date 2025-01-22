<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\API\Form\StoreFormRequest;
use App\Http\Resources\Form\FormInfoResource;
use App\Models\Form;

class FormController
{
    public function store(StoreFormRequest $request)
    {
        try {

            $user = auth()->guard('api')->user();

            // Create a new form record
            $form = new Form();
            $form->body = $request->body; // Assuming the request contains a body field
            $form->user_id = $user->id; // Set the user who created the form (optional)
            // Save the form to the database
            $form->save();

            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new FormInfoResource($form));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


}
