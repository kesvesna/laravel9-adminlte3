<?php

namespace Database\Factories\Equipments;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipments>
 */
class EquipmentHistoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'equipment_id' => fake()->numberBetween(1,40),
            'equipment_status_id' => fake()->numberBetween(1,4),
            'created_by_user_id' => fake()->numberBetween(1,10),
            'comment' => fake()->realText(15),
        ];
    }
}
