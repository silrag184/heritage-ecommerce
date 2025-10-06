<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name',
        'brand_logo',
        'slug',
        'description',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
