<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
 
            'id' => $this->id,
            'price' => $this->price ?? "",
            'description' => $this->description ?? "",
            'start_date' => $this->start_date ?? "",
            'end_date' => $this->end_date ?? "",
            'created_at'=> $this->created_at ?? "",
           
        ];
    }
}
