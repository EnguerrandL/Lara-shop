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
            'description' => fake()->sentence($nbWords = 10, $variableNbWords = true),
            'image' => fake()->imageUrl(50, 50, 'animals', true),
            'price' => fake()->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 100),
            'quantity' => fake()->numberBetween(1, 10),
        ];
    }
}
