<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingArea extends Model
{
    protected $fillable = [
        'area_name',
        'region',
        'postal_code',
        'shipping_cost',
        'delivery_time',
        'status'
    ];
}
