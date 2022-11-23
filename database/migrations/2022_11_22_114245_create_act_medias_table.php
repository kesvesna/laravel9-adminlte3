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
        Schema::create('act_medias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('act_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unique(['act_id', 'name']);
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
    {
        Schema::table('act_medias', function (Blueprint $table) {
            $table->dropForeign(['act_id']);
        });
        Schema::dropIfExists('act_medias');
    }
};
