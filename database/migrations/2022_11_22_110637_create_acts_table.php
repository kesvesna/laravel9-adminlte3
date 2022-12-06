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
            $table->foreignId('building_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('room_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('system_type_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->text('works')->nullable()->default(null);
            $table->text('remarks')->nullable()->default(null);
            $table->text('recommendations')->nullable()->default(null);
            $table->text('spare_parts')->nullable()->default(null);
            $table->tinyInteger('visible')->default(1);
            $table->dateTime('date');
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
            $table->dropForeign(['act_type_id']);
            $table->dropForeign(['system_type_id']);
            $table->dropForeign(['building_id']);
            $table->dropForeign(['room_id']);
        });
        Schema::dropIfExists('acts');
    }
};
