<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->monthName . 'wuteng',
            'price' => fake()->randomFloat(2, 2.5, 5.0) * 100000,
            'type' => fake()->randomElement(['fixed', 'sub']),
        ];
    }
}
