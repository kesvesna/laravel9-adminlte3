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
        Schema::create('equipment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')
                ->constrained('equipments')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('equipment_status_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('created_by_user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->text('comment')->nullable()->default(null);
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
    {Schema::table('equipment_histories', function (Blueprint $table) {
        $table->dropForeign(['equipment_id']);
        $table->dropForeign(['equipment_status_id']);
        $table->dropForeign(['created_by_user_id']);
    });
        Schema::dropIfExists('equipment_histories');
    }
};