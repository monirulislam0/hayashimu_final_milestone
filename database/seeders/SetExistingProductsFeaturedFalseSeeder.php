<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetExistingProductsFeaturedFalseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set all existing products to is_featured = false by default
        \DB::table('products')
            ->whereNull('is_featured')
            ->update(['is_featured' => false]);
    }
}
