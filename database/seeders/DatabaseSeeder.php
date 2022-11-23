<?php

namespace Database\Seeders;

use App\Models\Applications\Applications;
use App\Models\Repairs\Repair;
use App\Models\User;
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
        $this->call([
            ApplicationsStatusSeeder::class,
            BuildingsSeeder::class,
            FloorsSeeder::class,
            RoomsSeeder::class,
            TrkBuildingSeeder::class,
            TrkBuildingFloorSeeder::class,
            ServicesSeeder::class,
            RepairsStatusSeeder::class,
            ActTypesSeeder::class,
            EquipmentNamesSeeder::class,
            SystemTypesSeeder::class,
            WorkTypesSeeder::class,
        ]);

        User::factory(10)->create();
        Applications::factory(2)->create();
        Repair::factory(2)->create();


        $this->call([
            ApplicationHistoriesSeeder::class,
            RepairHistoriesSeeder::class,
            ApplicationRepairActSeeder::class,
        ]);

    }
}
