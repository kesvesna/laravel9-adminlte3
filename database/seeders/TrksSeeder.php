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
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('trks')->insert([
            'name' => 'Гудзон',
            'slug' => 'goodzone',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Европолис (м.Лесная)',
            'slug' => 'evropolis-lesnaya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'FORT Отрадное',
            'slug' => 'fort-otradnoe',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Золотой Вавилон',
            'slug' => 'zolotoi-vavilon',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Лондон Молл',
            'slug' => 'london-moll',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Порт Находка',
            'slug' => 'port-nahodka',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Пятая Авеню',
            'slug' => 'pyataya-avenu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Пять Озер',
            'slug' => 'pyat-ozer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Родео Драйв',
            'slug' => 'rodeo-drive',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Сити Молл',
            'slug' => 'city-moll',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Фиолент',
            'slug' => 'fiolent',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Форт Тауэр',
            'slug' => 'fort-tower',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Французский бульвар',
            'slug' => 'frantsuzskii-bulvar',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trks')->insert([
            'name' => 'Южный Полюс',
            'slug' => 'uzhnii-polus',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
