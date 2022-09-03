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
      
        if ($request->images) {
            $images = $request->file('images');
          // return response( $request->file('images'));
        foreach($images as $image ) {
            return response('k');
            $name = $images->getClientOriginalName();
            $path = $images->storeAs('uploads\hotel', $name, 'public');
        }    
       }

    // $imageName = "";

    // if($request->images){

    //  $image= $request->file('images');
    //   $name = $image->getClientOriginalName();
    //     $imageName = $image->storeAs('uploads/story', $name, 'public');
    // }
        $hotel = Hotel::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' =>$request->address,
            'images' => $path,
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

        $hotel->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' =>$request->address,
            'images' => $request->images,
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

   
    public function destroy($id)
    {

        $hotel = Hotel::find($id); 

        $hotel->delete();

        return response($hotel, 201);
    }
}
