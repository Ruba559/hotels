<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OfferResource;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {

        $offer = Offer::get();

        return  OfferResource::collection($offer);
     
    }


    public function store(Request $request)
    {
      
        $offer = Offer::create([
            'price' => $request->price,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

       
        return response($offer, 201);
    }


    public function update(Request $request, $id)
    {

        $offer = Offer::find($id); 

        $offer->update([
            'price' => $request->price,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response($offer, 201);
    }

   
    public function destroy($id)
    {

        $offer = Offer::find($id); 

        $offer->delete();

        return response($offer, 201);
    }
}
