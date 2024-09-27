<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content; // Add this line to import the Content model

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::create([
            'about_store' => 'About our store...',
            'store_features' => 'Our store features...',
            'store_address' => '123 Main St, City, Country',
            'phone' => '+1234567890',
            'email' => 'contact@store.com',
            'facebook_link' => 'https://facebook.com/ourstore',
            'whatsapp_link' => 'https://wa.me/1234567890',
            'instagram_link' => 'https://instagram.com/ourstore',
            'desktop_about_image' => '1727458562_wired-outline-1325-code-fork-hover-pinch.gif',
            'mobile_about_image' => '1727458562_wired-outline-1325-code-fork-hover-pinch.gif',
            'exchange_number' => '123456'
        ]);
    }
}
