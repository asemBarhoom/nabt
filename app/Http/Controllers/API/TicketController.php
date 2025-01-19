<?php

namespace App\Http\Controllers\API;
use App\Helpers\Response;
use App\Http\Requests\API\Ticket\StoreTicketRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Ticket\TicketCollection;
use App\Models\Ticket;
use App\Http\Resources\Ticket\TicketResource;
use Exception;

class TicketController
{
    public function index(FilterRequest $request){
        try{
            $tickets = Ticket::where('user_id',auth()->guard('api')->user()->id)
                ->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new TicketCollection($tickets));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
    public function store(StoreTicketRequest $request)
    {
        try {
            $data = $request->validated();
            $ticket = Ticket::create($data);
            $ticket->load('category', 'booking', 'user');
            return Response::respondSuccess(Response::SUCCESS, new TicketResource($ticket));
        } catch (Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
