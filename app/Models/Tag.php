<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag_name', 
        'slug', 
        'description', 
        'status'
    ];

    // Relationships
    public function productTags()
    {
        return $this->belongsToMany(ProductTags::class, 'tag_id');
    }
}
