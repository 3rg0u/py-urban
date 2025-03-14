<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\Expr\Cast\String_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 'py' . fake()->unique()->randomNumber(nbDigits: 2),
            'area' => fake()->randomFloat(2, min: 0, max: 200)
        ];
    }
}
