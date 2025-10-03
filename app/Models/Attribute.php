<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'attribute_name',
        'slug',
        'description',
        'status',
    ];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
