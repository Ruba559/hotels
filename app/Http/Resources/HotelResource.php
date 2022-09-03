<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
 
            'id' => $this->id,
            'name' => $this->name ?? "",
            'phone' => $this->phone ?? "",
            'email' => $this->email ?? "",
            'address' => $this->address ?? "",
            'images' => $this->images !=null? asset('storage'.$this->images):"" ,
            'stars' => $this->stars ?? "",
            'about_hotel' => $this->about_hotel ?? "",
            'price_of_night' => $this->price_of_night ?? "",
            'is_offer' => $this->is_offer ?? "",
            'check_in' => $this->check_in ?? "",
            'check_out' => $this->check_out ?? "",
            'region' =>  ! $this->region ? '' : new RegionResource($this->region) ,
            'created_at'=> $this->created_at ?? "",
           
        ];
    }
}
