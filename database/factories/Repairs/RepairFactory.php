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
            'repair_status_id' => fake()->numberBetween(1,6),
            'user_id' => fake()->numberBetween(1,6),
            'service_id' => fake()->numberBetween(1,6),
            'comment' => fake()->realText(100),
            'application_id' => fake()->numberBetween(0,5),
            'plan_date' => fake()->dateTime(),
            'responsible_user_id' => fake()->numberBetween(1,6),
        ];
    }
}
