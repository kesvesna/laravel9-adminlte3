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
        Schema::create('act_equipments', function (Blueprint $table) {
            $table->foreignId('act_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('equipment_id')
                ->constrained('equipments')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unique(['act_id', 'equipment_id']);
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
    {Schema::table('act_equipments', function (Blueprint $table) {
        $table->dropForeign(['act_id']);
        $table->dropForeign(['equipment_id']);
    });
        Schema::dropIfExists('act_equipments');
    }
};
