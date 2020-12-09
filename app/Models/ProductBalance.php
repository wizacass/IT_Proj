<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBalance extends Model
{
    use HasFactory;

    public function part()
    {
        return $this->belongsTo('App\Models\PlanePart', 'plane_part_id');
    }
}
