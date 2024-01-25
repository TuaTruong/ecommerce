<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeShip extends Model
{
    use HasFactory;

    public function city(){
        return $this->belongsTo(City::class,"matp");
    }

    public function province(){
        return $this->belongsTo(Province::class,"maqh");
    }

    public function ward(){
        return $this->belongsTo(Ward::class,"xaid");
    }
}
