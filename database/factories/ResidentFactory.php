<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Apartment;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $host = Arr::random(['host', 'member']);
        return [
            'id' => '' . fake()->unique()->randomNumber(9, true),
            'host' => $host,
            'name' => fake()->name,
            'apart_id' => Apartment::inRandomOrder()->first()->id,
            'email' => ($host == 'host') ? User::inRandomOrder()->first()->email : null
        ];
    }
}
