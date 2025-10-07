<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'brand_id',
        'unit_id',
        'product_name',
        'slug',
        'sku',
        'price',
        'discount_price',
        'stock',
        'short_description',
        'long_description',
        'status',
        'is_featured',
        'is_trending',
        'is_new',
        'hit_count',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function colorImages()
    {
        return $this->hasMany(ProductColorImage::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    public function productSizes()
    {
        return $this->hasMany(ProductSizes::class);
    }

    public function productTags()
    {
        return $this->hasMany(ProductTags::class);
    }
}
