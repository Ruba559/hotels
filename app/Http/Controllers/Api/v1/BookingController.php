<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BookingResource;
use App\Models\Booking;

class BookingController extends Controller
{

    public function index()
    {

        $booking = Booking::get();

        return  BookingResource::collection($booking);
     
    }


    public function store(Request $request)
    {
      
        $booking = Booking::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'guests' => $request->guests,
            'children' => $request->children,
            'number_of_night' => $request->number_of_night,
            'booking_start_date' => $request->booking_start_date,
            'booking_end_date' => $request->booking_end_date,
            'extend_the_booking' => $request->extend_the_booking,
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'hotel_id' => $request->hotel_id,
        ]);

       
        return response($booking, 201);
    }


    public function update(Request $request, $id)
    {

        $booking = Booking::find($id); 

        $booking->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'guests' => $request->guests,
            'children' => $request->children,
            'number_of_night' => $request->number_of_night,
            'booking_start_date' => $request->booking_start_date,
            'booking_end_date' => $request->booking_end_date,
            'extend_the_booking' => $request->extend_the_booking,
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'hotel_id' => $request->hotel_id,
        ]);

        return response($booking, 201);
    }

   
    public function destroy($id)
    {

        $booking = Booking::find($id); 

        $booking->delete();

        return response($booking, 201);
    }
}
