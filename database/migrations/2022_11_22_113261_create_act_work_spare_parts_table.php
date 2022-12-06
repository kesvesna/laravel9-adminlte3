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
        Schema::create('act_work_spare_parts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('act_work_id')
                ->constrained('act_works')
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
        Schema::table('act_work_spare_parts', function (Blueprint $table) {
            $table->dropForeign(['act_work_id']);
        });
        Schema::dropIfExists('act_work_spare_parts');
    }
};
