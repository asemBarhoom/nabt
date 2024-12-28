<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Event\EventCollection;
use App\Models\Event;

class EventController
{
    public function index(FilterRequest $request){
        try{
            $events = Event::filter()->order()->get();
            return Response::respondSuccess(Response::SUCCESS, new EventCollection($events));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
