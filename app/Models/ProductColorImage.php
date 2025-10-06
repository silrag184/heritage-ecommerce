<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorImage extends Model
{
     use HasFactory;

    protected $fillable = [
        'product_id',
        'color_code',
        'image_path',
    ];

    /**
     * Relationship: Each color-image belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
