<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{

    public function toArray($request)
    {
        return [
 
            'id' => $this->id,
            'category' => ! $this->category ? '' : new CategoryResource($this->category) ,
            'price_of_night' => $this->price_of_night ?? "",
            'is_available' => $this->is_available ?? "",
            'images' => $this->images !=null? asset('storage'.$this->images):"" ,
            'hotel' => ! $this->hotel ? '' : new HotelResource($this->hotel) ,
            'created_at'=> $this->created_at ?? "",
           
        ];
    }
}
