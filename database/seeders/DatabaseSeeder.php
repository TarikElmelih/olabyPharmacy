<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        // Create an admin user
        User::factory()->create([
            'name' => 'مدير',
            'email' => 'admin@example.com',
            'usertype' => 'admin',
            'password' => Hash::make('olaby@1900'),
        ]);
    }
}
