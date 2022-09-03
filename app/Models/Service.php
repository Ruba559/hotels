<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }    


    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    
}
