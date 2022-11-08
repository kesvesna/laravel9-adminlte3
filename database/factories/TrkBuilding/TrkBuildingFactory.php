<?php

namespace Database\Factories\TrkBuilding;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrkBuilding>
 */
class TrkBuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trk_id' =>  fake()->numberBetween(1, 15),
            'building_id' =>  fake()->numberBetween(1, 32),
        ];
    }
}
