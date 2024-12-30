<?php

namespace App\Http\Controllers\API;

use App\Helpers\General;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Booking\StoreBookingRequest;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Booking\BookingCollection;
use App\Http\Resources\Booking\BookingInfoResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterRequest $request){
        try{
            $user = auth()->id();
            $bookings = Booking::query()->where('user_id',$user)->filter()->order()->paginate($request->header('perpage'));
            return Response::respondSuccess(Response::SUCCESS, new BookingCollection($bookings));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        try {
            $user = auth()->id();
            $data = $request->all();
            $data['user_id'] = $user;
            $data['reservation_number'] = General::generateReservationNumber();
            unset($data['events']);
            $booking = Booking::create($data);
            $booking->events()->sync($request->events);
            return Response::respondSuccess(Response::SUCCESS, new BookingInfoResource($booking));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking){
        try{
            if ($booking->user_id==auth()->id()) {
                return Response::respondSuccess(Response::SUCCESS, new BookingInfoResource($booking));
            }else
                return Response::respondError(Response::NOT_AUTHORIZED,403);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
