<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTags extends Model
{
    protected $fillable = [
        'product_id',
        'tag_id',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
