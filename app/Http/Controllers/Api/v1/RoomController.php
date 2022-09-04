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

        if ($request->hasfile('images')) {
            $images = $request->file('images');
          
         foreach($images as $key => $image ) {

            $name = $image->getClientOriginalName();
            $path[$key] = $image->storeAs('uploads\room', $name, 'public');
        }    
       }

        $room = Room::create([
            'category_id' => $request->category_id,
            'price_of_night' => $request->price_of_night,
            'is_available' => '0',
            'images' => json_encode($path),
            'hotel_id' => $request->hotel_id,
        ]);

       
        return response($room, 201);
    }


    public function update(Request $request, $id)
    {

        $room = Room::find($id); 

        $room->update($request->except(['images']));

        if ($request->images) {
            if($room->images)
            { 
                foreach(json_decode($room->images) as $item)
                {
                    
                  if(File_exists(public_path().'/storage/'.$item))
                  {
                   
                      unlink(public_path().'/storage/'.$item);
                  }
                }

            $images = $request->file('images');
            
            foreach($images as $key => $image ) {

              $name = $image->getClientOriginalName();
              $path[$key] = $image->storeAs('uploads\room', $name, 'public');
            }  
            
                $room->update(['images' => json_encode($path)]);
        }else{
            
            $images = $request->file('images');
            
            foreach($images as $key => $image ) {

              $name = $image->getClientOriginalName();
              $path[$key] = $image->storeAs('uploads\hotel', $name, 'public');
            }  
    
             $room->update(['images' => json_encode($path)]);
        }
        }

        return response($room, 201);
    }

   
    public function destroy($id)
    {

        $room = Room::find($id); 

        foreach(json_decode($room->images) as $item)
        {
            
          if(File_exists(public_path().'/storage/'.$item))
          {

              unlink(public_path().'/storage/'.$item);
          }
        }
       
        $room->delete();

        return response($room, 201);
    }
}
