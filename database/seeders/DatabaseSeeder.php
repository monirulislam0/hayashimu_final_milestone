<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'user@example.com',
             'phone' => '01788111408',
             'password' => Hash::make('password'),
             'email_verified_at' => now(),
             'remember_token' => Str::random(10),
         ]);

        \App\Models\Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '01788111408',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        Category::factory(15)->create();
        Product::factory(50)->create();

        $this->call(SettingsTableSeeder::class);
    }
}
