<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('slug', 50)->unique();
            $table->integer('sort_order')->default(1);
            $table->foreignId('town_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->tinyInteger('visible')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('trks')->insert(
            [
                [
                    'name' => 'Академ Парк',
                    'slug' => 'academ-park',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Гудзон',
                    'slug' => 'goodzone',
                    'town_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Европолис (м.Лесная)',
                    'slug' => 'evropolis-lesnaya',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Европолис (м.Отрадное)',
                    'slug' => 'evropolis-otradnoe',
                    'town_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Золотой Вавилон',
                    'slug' => 'zolotoi-vavilon',
                    'town_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Лондон Молл',
                    'slug' => 'london-moll',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Порт Находка',
                    'slug' => 'port-nahodka',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Пятая Авеню',
                    'slug' => 'pyataya-avenu',
                    'town_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Пять Озер',
                    'slug' => 'pyat-ozer',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Родео Драйв',
                    'slug' => 'rodeo-drive',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Сити Молл',
                    'slug' => 'city-moll',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Фиолент',
                    'slug' => 'fiolent',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Форт Тауэр',
                    'slug' => 'fort-tower',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Французский бульвар',
                    'slug' => 'frantsuzskii-bulvar',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Южный Полюс',
                    'slug' => 'uzhnii-polus',
                    'town_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'FORT Отрадное',
                    'slug' => 'fort-otradnoe',
                    'town_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trks', function (Blueprint $table) {
            $table->dropForeign(['town_id']);
        });
        Schema::dropIfExists('trks');
    }
};
