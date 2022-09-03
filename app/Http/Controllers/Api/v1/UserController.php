<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {

        $user = User::get();

        return  UserResource::collection($user);
     
    }


    public function store(Request $request)
    {

      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

       
        return response($user, 201);
    }


    public function update(Request $request, $id)
    {

        $user = User::find($id); 

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response($user, 201);
    }

   
    public function destroy($id)
    {

        $user = User::find($id); 

        $user->delete();

        return response($user, 201);
    }


}
