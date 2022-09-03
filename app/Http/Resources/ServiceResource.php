<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
 
            'id' => $this->id,
            'name' => $this->name ?? "",
            'room' => ! $this->room ? '' : new RoomResource($this->room) ,
            'icon' => $this->icon !=null? asset('storage'.$this->icon):"" ,
            'hotel' => ! $this->hotel ? '' : new HotelResource($this->hotel) ,
            'price' => $this->price ?? "",
            'created_at'=> $this->created_at ?? "",
           
        ];
    }
}
