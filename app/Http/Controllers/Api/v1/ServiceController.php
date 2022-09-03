<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ServiceResource;
use App\Models\Service;

class ServiceController extends Controller
{
    
    public function index()
    {

        $service = Service::get();

        return  ServiceResource::collection($service);
     
    }


    public function store(Request $request)
    {
      
    $imageName = "";

    if($request->icon){

     $image= $request->file('icon');
      $name = $image->getClientOriginalName();
        $imageName = $image->storeAs('uploads/service', $name, 'public');
    }

        $service = Service::create([
            'name' => $request->name,
            'room_id' => $request->room_id,
            'hotel_id' => $request->hotel_id,
            'price' => $request->price,
            'icon' =>  $imageName,
        ]);

       
        return response($service, 201);
    }


    public function update(Request $request, $id)
    {

        $service = Service::find($id); 

        $service->update($request->except(['icon']));

        if ($request->icon) {
            if($service->icon)
            {
                if(File_exists(public_path().'/storage/'.$service->icon))
                {
        
                   unlink(public_path().'/storage/'.$service->icon);
                }

            $image= $request->file('icon');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('uploads\service', $name, 'public');

                $service->update(['icon' => $imageName]);
        }else{
            
            $image= $request->file('icon');
            $name = $image->getClientOriginalName();
            $imageName = $image->storeAs('uploads\service', $name, 'public');
    
             $service->update(['icon' => $imageName]);
        }
        }

        return response($service, 201);
    }

   
    public function destroy($id)
    {

        $service = Service::find($id); 

        $service->delete();

        
        if(File_exists(public_path().'/storage/'.$service->icon))
        {

           unlink(public_path().'/storage/'.$service->icon);
        }

        return response($service, 201);
    }
}
