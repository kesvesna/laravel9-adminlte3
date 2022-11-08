<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class TrksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('trks')->insert([
                'name' => 'Академ Парк',
                'slug' => 'academ-park',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('trks')->insert([
            'name' => 'Гудзон',
            'slug' => 'goodzone',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Европолис (м.Лесная)',
            'slug' => 'evropolis-lesnaya',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Европолис (м.Отрадное)',
            'slug' => 'evropolis-otradnoe',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'FORT Отрадное',
            'slug' => 'fort-otradnoe',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Золотой Вавилон',
            'slug' => 'zolotoi-vavilon',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Лондон Молл',
            'slug' => 'london-moll',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Порт Находка',
            'slug' => 'port-nahodka',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Пятая Авеню',
            'slug' => 'pyataya-avenu',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Пять Озер',
            'slug' => 'pyat-ozer',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Родео Драйв',
            'slug' => 'rodeo-drive',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Сити Молл',
            'slug' => 'city-moll',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Фиолент',
            'slug' => 'fiolent',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Форт Тауэр',
            'slug' => 'fort-tower',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Французский бульвар',
            'slug' => 'frantsuzskii-bulvar',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Южный Полюс',
            'slug' => 'uzhnii-polus',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
