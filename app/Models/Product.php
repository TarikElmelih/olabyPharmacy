<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'category_id', 'brand_id', 'subcategory_id', 'price', 'discount_price', 
        'image', 'short_description', 'long_description', 'in_stock', 
        'offer', 'featured', 'scientific_name_id', 'manufacturer'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Sub_Category::class, 'subcategory_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function getAdjustedPriceAttribute()
    {
        $exchangeNumber = Content::getExchangeNumber();
        return $this->price * $exchangeNumber;
    }

    public function getAdjustedDiscountPriceAttribute()
    {
        $exchangeNumber = Content::getExchangeNumber();
        return $this->discount_price * $exchangeNumber;
    }
    
    public function scientificName()
{
    return $this->belongsTo(ScientificName::class, 'scientific_name_id');
}

}
