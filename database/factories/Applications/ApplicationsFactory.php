<?php

namespace Database\Factories\Applications;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applications>
 */
class ApplicationsFactory extends Factory
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
            'application_status_id' => fake()->numberBetween(1,6),
            'user_id' => fake()->numberBetween(1,6),
            'service_id' => fake()->numberBetween(1,6),
            'notify_author' => fake()->numberBetween(0,1),
            'comment' => fake()->realText(100),
        ];
    }
}
