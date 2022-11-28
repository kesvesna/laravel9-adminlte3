<?php

namespace Database\Seeders;

use App\Models\Applications\ApplicationHistories;
use App\Models\Applications\Applications;
use App\Models\Equipments\Equipment;
use App\Models\Equipments\EquipmentHistories;
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
            EquipmentStatusSeeder::class,
            UserStatusSeeder::class,
        ]);

        User::factory(10)->create();
        Applications::factory(20)->create();
        ApplicationHistories::factory(20)->create();
        Repair::factory(20)->create();
        Equipment::factory(40)->create();
        EquipmentHistories::factory(500)->create();

        $this->call([
            //ApplicationHistoriesSeeder::class,
            RepairHistoriesSeeder::class,
            ApplicationRepairActEquipmentSeeder::class,
            //EquipmentHistoriesSeeder::class,
        ]);

    }
}
