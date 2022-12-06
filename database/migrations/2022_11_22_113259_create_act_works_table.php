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
                ->constrained('acts')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('work_id')
                ->constrained('work_types' )
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
        Schema::table('act_works', function (Blueprint $table) {
            $table->dropForeign(['act_id']);
            $table->dropForeign(['work_id']);
        });
        Schema::dropIfExists('act_works');
    }
};
