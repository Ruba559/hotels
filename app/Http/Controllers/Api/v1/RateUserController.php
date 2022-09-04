<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RateUserResource;
use App\Models\RateUser;

class RateUserController extends Controller
{
    
    public function index()
    {

        $rateUser = RateUser::get();

        return RateUserResource::collection($rateUser);
     
    }


    public function store(Request $request)
    {
      
        $rateUser = RateUser::create([
            'rate_id' => $request->rate_id,
            'user_id' => $request->user_id,
            'value' => $request->value,
        ]);

       
        return response($rateUser, 201);
    }


    public function update(Request $request, $id)
    {

        $rateUser = RateUser::find($id); 

        $rateUser->update([
            'rate_id' => $request->rate_id,
            'user_id' => $request->user_id,
            'value' => $request->value,
        ]);

        return response($rateUser, 201);
    }

   
    public function destroy($id)
    {

        $rateUser = RateUser::find($id); 

        $rateUser->delete();

        return response($rateUser, 201);
    }
}
