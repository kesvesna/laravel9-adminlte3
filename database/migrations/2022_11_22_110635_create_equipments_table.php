<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('system_type_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('room_id')
                ->constrained('trk_building_floor_room', 'id')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('equipment_name_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->tinyInteger('visible')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropForeign(['system_type_id']);
            $table->dropForeign(['room_id']);
            $table->dropForeign(['equipment_name_id']);
        });
        Schema::dropIfExists('equipments');
    }
};
