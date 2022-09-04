<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;

class HotelController extends Controller
{

    public function index()
    {

        $hotel = Hotel::get();

        return  HotelResource::collection($hotel);
     
    }


    public function store(Request $request)
    {
       
        if ($request->hasfile('images')) {
            $images = $request->file('images');
          
         foreach($images as $key => $image ) {

            $name = $image->getClientOriginalName();
            $path[$key] = $image->storeAs('uploads\hotel', $name, 'public');
        }    
       }

        $hotel = Hotel::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' =>$request->address,
            'images' => json_encode($path),
            'stars' => $request->stars,
            'about_hotel' => $request->about_hotel,
            'price_of_night' => $request->price_of_night,
            'is_offer' => $request->is_offer,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'region_id' => $request->region_id,
        ]);
       
        return response($hotel, 201);
    }


    public function update(Request $request, $id)
    {

        $hotel = Hotel::find($id); 

        $hotel->update($request->except(['images']));

        if ($request->images) {
            if($hotel->images)
            { 
                foreach(json_decode($hotel->images) as $item)
                {
                    
                  if(File_exists(public_path().'/storage/'.$item))
                  {
                   
                      unlink(public_path().'/storage/'.$item);
                  }
                }

            $images = $request->file('images');
            
            foreach($images as $key => $image ) {

              $name = $image->getClientOriginalName();
              $path[$key] = $image->storeAs('uploads\hotel', $name, 'public');
            }  
            
                $hotel->update(['images' => json_encode($path)]);
        }else{
            
            $images = $request->file('images');
            
            foreach($images as $key => $image ) {

              $name = $image->getClientOriginalName();
              $path[$key] = $image->storeAs('uploads\hotel', $name, 'public');
            }  
    
             $hotel->update(['images' => json_encode($path)]);
        }
        }
        return response($hotel, 201);
    }

   
    public function destroy($id)
    {

        $hotel = Hotel::find($id); 

        foreach(json_decode($hotel->images) as $item)
        {
            
          if(File_exists(public_path().'/storage/'.$item))
          {

              unlink(public_path().'/storage/'.$item);
          }
        }
        $hotel->delete();

        return response($hotel, 201);
    }
}
