<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        $products = [
            [
                'name' => 'iPhone 13',
                'category_id' => $categories->where('code', 'PHONE')->first()->id,
                'brand_id' => 1, // Assuming Apple brand has ID 1
                'subcategory_id' => 1,
                'price' => 999.99,
                'discount_price' => 899.99,
                'image' => 'iphone13.jpg',
                'short_description' => 'Latest iPhone model',
                'long_description' => 'The iPhone 13 features a powerful A15 Bionic chip, improved cameras, and 5G capability.',
                'in_stock' => true,
                'offer' => true,
                'featured' => true,
                'scientific_name_id' => 1,
                'manufacturer' => 'Apple Inc.'
            ],
            [
                'name' => 'MacBook Pro',
                'category_id' => $categories->where('code', 'LAPTOP')->first()->id,
                'brand_id' => 1, // Assuming Apple brand has ID 1
                'subcategory_id' => 1,
                'price' => 1999.99,
                'discount_price' => 1899.99,
                'image' => 'macbook_pro.jpg',
                'short_description' => 'Powerful laptop for professionals',
                'long_description' => 'The MacBook Pro offers exceptional performance with its M1 chip, Retina display, and long battery life.',
                'in_stock' => true,
                'offer' => false,
                'featured' => true,
                'scientific_name_id' => 1,
                'manufacturer' => 'Apple Inc.'
            ],
            [
                'name' => 'Samsung Smart TV',
                'category_id' => $categories->where('code', 'HOME')->first()->id,
                'brand_id' => 1, // Assuming Samsung brand has ID 2
                'subcategory_id' => 1,
                'price' => 799.99,
                'discount_price' => 749.99,
                'image' => 'samsung_tv.jpg',
                'short_description' => '4K Smart TV',
                'long_description' => 'Experience stunning 4K resolution and smart features with this Samsung Smart TV.',
                'in_stock' => true,
                'offer' => true,
                'featured' => false,
                'scientific_name_id' => 1,
                'manufacturer' => 'Samsung Electronics'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}