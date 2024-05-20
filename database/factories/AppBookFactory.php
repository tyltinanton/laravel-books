<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AppBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'title' => fake()->name(),
            'genre' => fake()->name(),
            'publisher' => fake()->name(),
            'publication' => fake()->date(),
            'author' => fake()->name(),
            'amount' => rand(0, 1000),
            'price' => rand(0, 1000),
        ];
    }
}
