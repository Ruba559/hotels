<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
 
            'id' => $this->id,
            'name' => $this->name ?? "",
            'guests' => $this->guests ?? "",
            'phone' => $this->phone ?? "",
            'children' => $this->children ?? "",
            'number_of_night' => $this->number_of_night ?? "",
            'booking_start_date' => $this->booking_start_date ?? "",
            'booking_end_date' => $this->booking_end_date ?? "",
            'extend_the_booking	' => $this->extend_the_booking ?? "",
            'room' =>! $this->room ? '' : new RoomResource($this->room) ,
            'user' => ! $this->user ? '' : new UserResource($this->user) ,
            'hotel' => ! $this->hotel ? '' : new HotelResource($this->hotel) ,
            'created_at'=> $this->created_at ?? "",
           
        ];
    }
}
