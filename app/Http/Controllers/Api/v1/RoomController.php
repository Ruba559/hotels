<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RoomResource;
use App\Models\Room;

class RoomController extends Controller
{
   
    public function index()
    {

        $room = Room::get();

        return  RoomResource::collection($room);
     
    }


    public function store(Request $request)
    {
      
        $room = Room::create([
            'category_id' => $request->category_id,
            'price_of_night' => $request->price_of_night,
            'is_available' => '0',
            'images' => $request->images,
            'hotel_id' => $request->hotel_id,
        ]);

       
        return response($room, 201);
    }


    public function update(Request $request, $id)
    {

        $room = Room::find($id); 

        $room->update([
            'category_id' => $request->category_id,
            'price_of_night' => $request->price_of_night,
            'is_available' => '0',
            'images' => $request->images,
            'hotel_id' => $request->hotel_id,
        ]);

        return response($room, 201);
    }

   
    public function destroy($id)
    {

        $room = Room::find($id); 

        $room->delete();

        return response($room, 201);
    }
}
