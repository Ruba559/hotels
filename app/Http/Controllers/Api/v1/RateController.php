<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RateResource;
use App\Models\Rate;

class RateController extends Controller
{

    public function index()
    {

        $rate = Rate::get();

        return  RateResource::collection($rate);
     
    }


    public function store(Request $request)
    {
      
        $rate = Rate::create([
            'name' => $request->name,
        ]);

       
        return response($rate, 201);
    }


    public function update(Request $request, $id)
    {

        $rate = Rate::find($id); 

        $rate->update([
            'name' => $request->name,
        ]);

        return response($rate, 201);
    }

   
    public function destroy($id)
    {

        $rate = Rate::find($id); 

        $rate->delete();

        return response($rate, 201);
    }
}
