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
        Schema::create('equipment_medias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')
                ->constrained('equipments')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unique(['equipment_id', 'name']);
            $table->string('name');
            $table->integer('sort_order')->default(1);
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
    {Schema::table('equipment_medias', function (Blueprint $table) {
        $table->dropForeign(['equipment_id']);
    });
        Schema::dropIfExists('equipment_medias');
    }
};
