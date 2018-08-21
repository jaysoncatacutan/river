<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Http\Resources\Booking as BookingResource;
use App\Http\Requests;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at','desc')->paginate();

        return BookingResource::collection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = $request->isMethod('put')
            ? Booking::findOrFail($request->booking_id)
            : new Booking;

        $booking->id = $request->input('booking_id');
        $booking->guest = $request->input('guest');
        $booking->message = $request->input('message');
        $booking->from_date = $request->input('from_date');
        $booking->to_date = $request->input('to_date');

        if($booking->save()){
            return new BookingResource($booking);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return new BookingResource($booking);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        if($booking->delete()){
            return new BookingResource($booking);
        }
    }
}
