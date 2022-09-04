<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RateUserResources extends JsonResource
{
  
    public function toArray($request)
    {
        return [
 
            'id' => $this->id,
            'rate_id' => $this->rate_id ?? "",
            'user_id' => $this->user_id ?? "",
            'value' => $this->value ?? "",
            'created_at'=> $this->created_at ?? "",
        ];
    }
}
