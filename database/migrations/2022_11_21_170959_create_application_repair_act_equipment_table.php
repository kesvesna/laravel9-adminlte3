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
        Schema::create('application_repair_act_equipment', function (Blueprint $table) {
            $table->bigInteger('application_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('repair_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('act_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('equipment_id')->unsigned()->nullable()->default(null);
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
    {
        Schema::dropIfExists('application_repair_act');
    }
};
