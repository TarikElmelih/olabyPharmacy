<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronics',
                'code' => 'ELEC',
                'image' => 'electronics.jpg',
                'desc' => 'Electronic devices and accessories',
                'created_by' => 1, // Assuming admin user has ID 1
                'subcategory_id' => 1,
                
            ],
            [
                'name' => 'Smartphones',
                'code' => 'PHONE',
                'image' => 'smartphones.jpg',
                'desc' => 'Mobile phones and accessories',
                'created_by' => 1,
                'subcategory_id' => 1,
                 // We'll update this after creating the parent
            ],
            [
                'name' => 'Laptops',
                'code' => 'LAPTOP',
                'image' => 'laptops.jpg',
                'desc' => 'Portable computers',
                'created_by' => 1,
                'subcategory_id' => 1,
                 // We'll update this after creating the parent
            ],
            [
                'name' => 'Home Appliances',
                'code' => 'HOME',
                'image' => 'home_appliances.jpg',
                'desc' => 'Appliances for your home',
                'created_by' => 1,
                'subcategory_id' => 1,
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['code' => $category['code']], $category);
        }

      
    }
}