<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RegionResource;
use App\Models\Region;

class RegionController extends Controller
{

    public function index()
    {

        $region = Region::get();

        return  RegionResource::collection($region);
     
    }


    public function store(Request $request)
    {
      
        $region = Region::create([
            'name' => $request->name,
            
        ]);

       
        return response($region, 201);
    }


    public function update(Request $request, $id)
    {

        $region = Region::find($id); 

        $region->update([
            'name' => $request->name,
            
        ]);

        return response($region, 201);
    }

   
    public function destroy($id)
    {

        $region = Region::find($id); 

        $region->delete();

        return response($region, 201);
    }
}
