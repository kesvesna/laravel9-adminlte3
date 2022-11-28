<?php

namespace Database\Factories\Applications;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applications\ApplicationHistories>
 */
class ApplicationHistoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'application_id' => fake()->numberBetween(1, 15),
            'service_id' => fake()->numberBetween(1,6),
            'application_status_id' => fake()->numberBetween(1,9),
            'user_id' => fake()->numberBetween(1,10),
            'comment' => fake()->realText(20),
        ];
    }
}
