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
        Schema::create('trk_building_floor_room', function (Blueprint $table) {
            $table->foreignId('trk_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('building_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('floor_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('room_id')
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
        Schema::table('trk_building_floor_room', function (Blueprint $table) {
            $table->dropForeign(['trk_id']);
            $table->dropForeign(['building_id']);
            $table->dropForeign(['floor_id']);
            $table->dropForeign(['room_id']);
        });
        Schema::dropIfExists('trk_building_floor_room');
    }
};
