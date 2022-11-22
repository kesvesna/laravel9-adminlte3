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
        Schema::create('acts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('act_type_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('trk_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('room_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('equipment_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unique(['act_type_id', 'trk_id', 'room_id', 'equipment_id', 'works', 'remarks', 'recommendations', 'spare_parts']);
            $table->text('works')->nullable()->default(null);
            $table->text('remarks')->nullable()->default(null);
            $table->text('recommendations')->nullable()->default(null);
            $table->text('spare_parts')->nullable()->default(null);
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
        Schema::table('acts', function (Blueprint $table) {
            $table->dropForeign(['trk_id']);
            $table->dropForeign(['room_id']);
            $table->dropForeign(['equipment_id']);
            $table->dropForeign(['act_type_id']);
        });
        Schema::dropIfExists('acts');
    }
};
