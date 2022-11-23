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
        Schema::create('building_floor_trk', function (Blueprint $table) {
            $table->unique(['trk_id', 'building_id', 'floor_id']);
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
        Schema::table('building_floor_trk', function (Blueprint $table) {
            $table->dropForeign(['trk_id']);
            $table->dropForeign(['building_id']);
            $table->dropForeign(['floor_id']);
        });
        Schema::dropIfExists('building_floor_trk');
    }
};
