<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cancellation\CancellationCollection;
use App\Http\Resources\Cancellation\CancellationInfoResource;
use App\Models\Booking;
use App\Models\Cancellation;
use Illuminate\Http\Request;
use App\Http\Requests\API\Cancellation\StoreCancellationRequest;

class CancellationController extends Controller
{

    public function index(Request $request)
    {
        try{
            $faqs = Cancellation::where('user_id',auth()->guard('api')->user()->id)->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new CancellationCollection($faqs));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }




    public function show(Cancellation $faq)
    {
        try{
            return Response::respondSuccess(Response::SUCCESS, new CancellationInfoResource($faq));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function store(StoreCancellationRequest $request)
    {
        try {

            $user = auth()->guard('api')->user();

            // Create a new cancellation record
            $cancellation = new Cancellation();
            $cancellation->title = $request->title; // Assuming the request contains a title field
            $cancellation->body = $request->body; // Assuming the request contains a body field
            $cancellation->booking_id = $request->booking_id;
            $cancellation->category_id = $request->category_id; // Link to the category if found
            $cancellation->user_id = $user->id; // Set the user who created the cancellation (optional)
            // Save the cancellation to the database
            $cancellation->save();

            $cancellation->booking->addStatus('cancellation_requested',$user->id);
            return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, new CancellationInfoResource($cancellation));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }



}
