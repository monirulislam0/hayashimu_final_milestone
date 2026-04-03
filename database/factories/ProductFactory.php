<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'description' => fake()->paragraph(),
            'small_image' => fake()->imageUrl,
            'detail_image' => fake()->imageUrl,
            'price' => 500,
            'featured' => 1,
            'new_item' => 1,
            'status' => 1,
        ];
    }
}
