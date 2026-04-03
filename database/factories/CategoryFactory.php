<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'parent_id' => 1,
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl,
            'featured' => 1,
            'menu' => 1,
            'status' => 1,
        ];
    }
}
