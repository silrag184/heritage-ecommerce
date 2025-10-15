<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'customer_id',
        'session_id',
        'cart_data',
        'subtotal',
        'shipping_cost',
        'total',
        'shipping_region',
        'shipping_area_id',
    ];

    protected $casts = [
        'cart_data' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function shippingArea()
    {
        return $this->belongsTo(ShippingArea::class, 'shipping_area_id');
    }
}
