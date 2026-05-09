<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetExistingNewsFeaturedFalseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set all existing news records to is_featured = false by default
        \DB::table('news')
            ->whereNull('is_featured')
            ->update(['is_featured' => false]);
    }
}
