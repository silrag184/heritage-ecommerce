<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComboPackage extends Model
{
    protected $fillable = [
        'name', 'slug', 'url',
        'meta_title', 'meta_description', 'meta_keywords',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'combo_product_packages', 'combo_package_id', 'product_id');
    }

    public function products_count(){
        return $this->products()->count();
    }

}
