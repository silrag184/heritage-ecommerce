<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $fillable = [
        'color_name',
        'slug',
        'color_code',
        'description',
        'status',
    ];
}
