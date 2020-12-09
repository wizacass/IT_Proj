<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function supplier() 
    {
        return $this->belongsTo('App\Models\Supplier');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\DeliveryStatus', 'delivery_status_id');
    }
}
