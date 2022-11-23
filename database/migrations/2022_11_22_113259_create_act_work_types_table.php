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
        Schema::create('act_work_types', function (Blueprint $table) {
            $table->foreignId('act_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('work_type_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unique(['act_id', 'work_type_id']);
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
        Schema::table('act_work_types', function (Blueprint $table) {
            $table->dropForeign(['act_id']);
            $table->dropForeign(['work_type_id']);
        });
        Schema::dropIfExists('act_work_types');
    }
};
