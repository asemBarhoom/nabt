<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Activity\ActivityCollection;
use App\Http\Resources\Activity\ActivityResource;
use App\Models\Activity;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Date;

class ActivityController extends Controller
{
    public function index(FilterRequest $request){
        try{
            $user = auth()->guard('api')->user();
            $activities = Activity::where('user_id', $user->id)
            ->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new ActivityCollection($activities));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


    public function markAsRead()
    {
        try {
            $activityId = request()->id;



            $activity = Activity::findOrFail($activityId);
            $activity->read_at = $activity->read_at ? $activity->read_at : now();
            $activity->save();


            // Return success response with the activity resource
            return Response::respondSuccess(
                Response::SUCCESS,
                new ActivityResource($activity)
            );
        } catch (ModelNotFoundException $e) {
            return Response::respondError("Activity not found.");
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


    public function markAllAsRead(FilterRequest $request)
    {

        try {
            $Activities =
                request()->user()->activities()
                    ->get();
            foreach ($Activities as $activity) {
                $activity->read_at = $activity->read_at ? $activity->read_at : now();
                $activity->save();
            }

            $Activities =
                request()->user()->activities()
                    ->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new ActivityCollection($Activities));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

}
