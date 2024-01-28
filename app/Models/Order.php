<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }

    // public function order_details(){
    //     return $this->ha(OrderDetails::class,"id");
    // }
}
