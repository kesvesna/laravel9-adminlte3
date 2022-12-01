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
        Schema::create('act_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('act_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('room_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('equipment_id')
                ->constrained('equipments')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('work_type_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->integer('spare_part_id')->nullable()->default(null);
            $table->decimal('count')->nullable()->default(null);
            $table->string('model')->nullable()->default(null);
            $table->text('comment')->nullable()->default(null);
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
        Schema::table('act_works', function (Blueprint $table) {
            $table->dropForeign(['act_id']);
            $table->dropForeign(['work_type_id']);
            $table->dropForeign(['room_id']);
            $table->dropForeign(['equipment_id']);
        });
        Schema::dropIfExists('act_works');
    }
};
