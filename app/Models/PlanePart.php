<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanePart extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer',
        'model',
        'part_type',
        'delivery_time',
        'price',
        'amount',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');    
    }
}
