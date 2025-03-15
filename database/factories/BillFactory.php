<?php

namespace Database\Factories;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name,
            'create_date' => fake()->date(),
            'creator_id' => Manager::inRandomOrder()->first()->id,
            'price' => fake()->randomFloat(2, 3, 5) * 100000
        ];
    }
}
