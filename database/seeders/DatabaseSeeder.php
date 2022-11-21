<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TrksBuildings\TrkBuilding;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the applications's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            ApplicationsStatusSeeder::class,
            BuildingsSeeder::class,
            FloorsSeeder::class,
            RoomsSeeder::class,
            TrkBuildingSeeder::class,
            TrkBuildingFloorSeeder::class,
            ServicesSeeder::class,
            RepairsStatusSeeder::class,
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Applications\Applications::factory(20)->create();
        \App\Models\Repairs\Repair::factory(20)->create();

        $this->call([
            ApplicationHistoriesSeeder::class,
        ]);

    }
}
