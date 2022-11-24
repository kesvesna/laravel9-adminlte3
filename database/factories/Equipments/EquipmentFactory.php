<?php

namespace Database\Factories\Equipments;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipments>
 */
class EquipmentFactory extends Factory
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
            'system_type_id' => fake()->numberBetween(1,26),
            'building_id' => fake()->numberBetween(1,19),
            'floor_id' => fake()->numberBetween(1,32),
            'room_id' => fake()->numberBetween(1,5),
            'equipment_name_id' => fake()->numberBetween(1,14),


        ];
    }
}
