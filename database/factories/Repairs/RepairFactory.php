<?php

namespace Database\Factories\Repairs;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repairs>
 */
class RepairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trk_id' => fake()->numberBetween(1, 15),
            'comment' => fake()->realText(100),
        ];
    }
}
